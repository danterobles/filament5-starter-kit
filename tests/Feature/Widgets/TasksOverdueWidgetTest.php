<?php

use App\Filament\Widgets\TasksOverdueWidget;
use App\Models\Task;
use App\Models\User;
use Database\Seeders\ShieldSeeder;
use Livewire\Livewire;

beforeEach(function () {
    $this->seed(ShieldSeeder::class);
});

test('tasks overdue widget renders without errors', function () {
    $admin = User::factory()->create();
    $admin->assignRole('super_admin');
    $this->actingAs($admin);

    Task::factory()->for($admin)->count(2)->create();

    Livewire::test(TasksOverdueWidget::class)
        ->assertSuccessful();
});

test('widget shows correct overdue, due soon, no due date and completed counts for the current user', function () {
    $user = User::factory()->create();
    $user->givePermissionTo('ViewAny:Task', 'View:Task');
    $this->actingAs($user);

    Task::factory()->for($user)->todo()->overdue()->count(3)->create();
    Task::factory()->for($user)->inProgress()->dueSoon()->create();
    Task::factory()->for($user)->todo()->noDueDate()->count(4)->create();
    Task::factory()->for($user)->completed()->count(2)->create();

    Livewire::test(TasksOverdueWidget::class)
        ->assertSee('3') // overdue: 3 open tasks with a past due_date
        ->assertSee('1') // due soon: 1 open task due within the next 7 days
        ->assertSee('4') // sin fecha límite: 4 open tasks with no due_date
        ->assertSee('2'); // completed: 2 tasks
});

test('a task past its due date but already completed does not count as overdue', function () {
    $user = User::factory()->create();
    $user->givePermissionTo('ViewAny:Task', 'View:Task');
    $this->actingAs($user);

    Task::factory()->for($user)->completed()->overdue()->create();

    $overdueCount = Task::query()
        ->where('status', '!=', 'completed')
        ->whereNotNull('due_date')
        ->where('due_date', '<', now())
        ->count();

    expect($overdueCount)->toBe(0);
});

test('an open task with a due date far in the future does not count as overdue or due soon', function () {
    $user = User::factory()->create();
    $user->givePermissionTo('ViewAny:Task', 'View:Task');
    $this->actingAs($user);

    Task::factory()->for($user)->todo()->create(['due_date' => now()->addMonths(2)]);

    $overdueCount = Task::query()
        ->where('status', '!=', 'completed')
        ->whereNotNull('due_date')
        ->where('due_date', '<', now())
        ->count();

    $dueSoonCount = Task::query()
        ->where('status', '!=', 'completed')
        ->whereNotNull('due_date')
        ->whereBetween('due_date', [now(), now()->addDays(7)])
        ->count();

    expect($overdueCount)->toBe(0);
    expect($dueSoonCount)->toBe(0);
});

test('a regular user does not see another user\'s tasks in their counts', function () {
    $viewer = User::factory()->create();
    $viewer->givePermissionTo('ViewAny:Task', 'View:Task');

    $other = User::factory()->create();
    Task::factory()->for($other)->todo()->overdue()->count(3)->create();

    Task::factory()->for($viewer)->todo()->overdue()->create();

    $this->actingAs($viewer);

    Livewire::test(TasksOverdueWidget::class)
        ->assertSuccessful();

    $overdueForViewer = Task::query()
        ->where('status', '!=', 'completed')
        ->whereNotNull('due_date')
        ->where('due_date', '<', now())
        ->count();

    expect($overdueForViewer)->toBe(1);
});

test('a super_admin sees overdue counts across every user', function () {
    $admin = User::factory()->create();
    $admin->assignRole('super_admin');

    $otherUser = User::factory()->create();
    Task::factory()->for($admin)->todo()->overdue()->create();
    Task::factory()->for($otherUser)->todo()->overdue()->create();

    $this->actingAs($admin);

    $overdueForAdmin = Task::query()
        ->where('status', '!=', 'completed')
        ->whereNotNull('due_date')
        ->where('due_date', '<', now())
        ->count();

    expect($overdueForAdmin)->toBe(2);

    Livewire::test(TasksOverdueWidget::class)
        ->assertSuccessful();
});
