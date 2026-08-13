<?php

use App\Filament\Pages\TaskBoard;
use App\Models\Task;
use App\Models\User;
use Database\Seeders\ShieldSeeder;
use Livewire\Livewire;

beforeEach(function () {
    $this->seed(ShieldSeeder::class);
});

test('a user without the View:TaskBoard permission cannot access the board', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $this->get(TaskBoard::getUrl())->assertForbidden();
});

test('a user with the View:TaskBoard permission can render the board', function () {
    $user = User::factory()->create();
    $user->givePermissionTo('View:TaskBoard');
    $this->actingAs($user);

    $this->get(TaskBoard::getUrl())->assertSuccessful();

    Livewire::test(TaskBoard::class)->assertSuccessful();
});

test('a regular user can move their own task via drag and drop', function () {
    $user = User::factory()->create();
    $user->givePermissionTo('View:TaskBoard');
    $this->actingAs($user);

    $ownTask = Task::factory()->for($user)->todo()->create();

    Livewire::test(TaskBoard::class)
        ->call('moveCard', (string) $ownTask->id, 'completed');

    expect($ownTask->fresh()->status)->toBe('completed');
});

test('OwnedByUserScope prevents a regular user from moving another user\'s task via a crafted card id', function () {
    $user = User::factory()->create();
    $user->givePermissionTo('View:TaskBoard');
    $other = User::factory()->create();

    $othersTask = Task::factory()->for($other)->todo()->create();

    $this->actingAs($user);

    expect(fn () => Livewire::test(TaskBoard::class)
        ->call('moveCard', (string) $othersTask->id, 'completed'))
        ->toThrow(InvalidArgumentException::class, "Card not found: {$othersTask->id}");

    expect($othersTask->fresh()->status)->toBe('todo');
});

test('a super_admin can move any task via drag and drop', function () {
    $admin = User::factory()->create();
    $admin->assignRole('super_admin');
    $this->actingAs($admin);

    $someonesTask = Task::factory()->todo()->create();

    Livewire::test(TaskBoard::class)
        ->call('moveCard', (string) $someonesTask->id, 'completed');

    expect($someonesTask->fresh()->status)->toBe('completed');
});
