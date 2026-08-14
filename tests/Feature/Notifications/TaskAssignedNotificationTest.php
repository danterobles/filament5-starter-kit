<?php

use App\Filament\Resources\Tasks\Pages\EditTask;
use App\Filament\Resources\Tasks\TaskResource;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskAssignedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

test('it is queued', function () {
    $task = Task::factory()->make();

    expect(new TaskAssignedNotification($task))->toBeInstanceOf(ShouldQueue::class);
});

test('it is sent via the database and mail channels', function () {
    $assignee = User::factory()->create();
    $task = Task::factory()->for($assignee)->create();

    $notification = new TaskAssignedNotification($task);

    expect($notification->via($assignee))->toBe(['database', 'mail']);
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

test('it builds the expected mail message', function () {
    $assignee = User::factory()->create(['name' => 'Ana', 'last' => 'García']);
    $task = Task::factory()->for($assignee)->create(['title' => 'Preparar reporte mensual']);

    $notification = new TaskAssignedNotification($task);

    $mail = $notification->toMail($assignee);

    expect($mail->subject)->toBe('Nueva tarea asignada')
        ->and($mail->greeting)->toBe('Hola, Ana García.')
        ->and($mail->introLines)->toContain('Se te asignó la tarea "Preparar reporte mensual" como recordatorio.')
        ->and($mail->actionText)->toBe('Ver tarea')
        ->and($mail->actionUrl)->toBe(TaskResource::getUrl('edit', ['record' => $task]));
});

test('notifying a user renders the task assigned mail message', function () {
    Notification::fake();

    $assignee = User::factory()->create(['name' => 'Ana', 'last' => 'García']);
    $task = Task::factory()->for($assignee)->create(['title' => 'Preparar reporte mensual']);

    $assignee->notify(new TaskAssignedNotification($task));

    Notification::assertSentTo(
        $assignee,
        TaskAssignedNotification::class,
        function (TaskAssignedNotification $notification, array $channels) use ($assignee, $task): bool {
            expect($channels)->toBe(['database', 'mail']);

            $mail = $notification->toMail($assignee);

            return $mail->subject === 'Nueva tarea asignada'
                && $mail->actionUrl === TaskResource::getUrl('edit', ['record' => $task]);
        }
    );
});
