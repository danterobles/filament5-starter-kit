<?php

use App\Filament\Resources\Tasks\Pages\EditTask;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskAssignedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

test('it is queued', function () {
    $task = Task::factory()->make();

    expect(new TaskAssignedNotification($task))->toBeInstanceOf(ShouldQueue::class);
});

test('it is only sent via the database channel', function () {
    $assignee = User::factory()->create();
    $task = Task::factory()->for($assignee)->create();

    $notification = new TaskAssignedNotification($task);

    expect($notification->via($assignee))->toBe(['database']);
});

test('it builds the expected database payload', function () {
    $assignee = User::factory()->create();
    $task = Task::factory()->for($assignee)->create(['title' => 'Preparar reporte mensual']);

    $notification = new TaskAssignedNotification($task);

    $payload = $notification->toDatabase($assignee);

    expect($payload['title'])->toBe('Nueva tarea asignada')
        ->and($payload['body'])->toBe('Se te asignó la tarea "Preparar reporte mensual" como recordatorio.')
        ->and($payload['actions'][0]['url'])->toBe(EditTask::getUrl(['record' => $task]));
});

test('notifying a user sends the task assigned notification', function () {
    Notification::fake();

    $assignee = User::factory()->create();
    $task = Task::factory()->for($assignee)->create();

    $assignee->notify(new TaskAssignedNotification($task));

    Notification::assertSentTo(
        $assignee,
        TaskAssignedNotification::class,
        fn (TaskAssignedNotification $notification): bool => $notification->task->is($task)
    );
});
