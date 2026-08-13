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

test('widget shows correct overdue and due soon counts for the current user', function () {
    $user = User::factory()->create();
    $user->givePermissionTo('ViewAny:Task', 'View:Task');
    $this->actingAs($user);

    Task::factory()->for($user)->todo()->count(3)->create(['created_at' => now()->subDays(10)]);
    Task::factory()->for($user)->inProgress()->create(['created_at' => now()->subDays(1)]);
    Task::factory()->for($user)->completed()->count(2)->create(['created_at' => now()->subDays(20)]);

    Livewire::test(TasksOverdueWidget::class)
        ->assertSee('3') // overdue: 3 open tasks older than 7 days
        ->assertSee('1') // due soon: 1 open task within the last 7 days
        ->assertSee('2'); // completed: 2 tasks
});

test('a regular user does not see another user\'s tasks in their counts', function () {
    $viewer = User::factory()->create();
    $viewer->givePermissionTo('ViewAny:Task', 'View:Task');

    $other = User::factory()->create();
    Task::factory()->for($other)->todo()->count(3)->create(['created_at' => now()->subDays(10)]);

    Task::factory()->for($viewer)->todo()->create(['created_at' => now()->subDays(10)]);

    $this->actingAs($viewer);

    Livewire::test(TasksOverdueWidget::class)
        ->assertSuccessful();

    $overdueForViewer = Task::query()
        ->where('status', '!=', 'completed')
        ->where('created_at', '<', now()->subDays(7))
        ->count();

    expect($overdueForViewer)->toBe(1);
});

test('a super_admin sees overdue counts across every user', function () {
    $admin = User::factory()->create();
    $admin->assignRole('super_admin');

    $otherUser = User::factory()->create();
    Task::factory()->for($admin)->todo()->create(['created_at' => now()->subDays(10)]);
    Task::factory()->for($otherUser)->todo()->create(['created_at' => now()->subDays(10)]);

    $this->actingAs($admin);

    $overdueForAdmin = Task::query()
        ->where('status', '!=', 'completed')
        ->where('created_at', '<', now()->subDays(7))
        ->count();

    expect($overdueForAdmin)->toBe(2);

    Livewire::test(TasksOverdueWidget::class)
        ->assertSuccessful();
});
