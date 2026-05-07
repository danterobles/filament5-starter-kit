<?php

use App\Models\Task;
use App\Models\User;
use Filament\Panel;

test('full_name combines name and last', function () {
    $user = new User(['name' => 'Ana', 'last' => 'López']);

    expect($user->full_name)->toBe('Ana López');
});

test('full_name trims extra spaces when last is empty', function () {
    $user = new User(['name' => 'Ana', 'last' => '']);

    expect($user->full_name)->toBe('Ana');
});

test('full_name trims extra spaces when last is null', function () {
    $user = new User(['name' => 'Ana', 'last' => null]);

    expect($user->full_name)->toBe('Ana');
});

test('getFilamentAvatarUrl returns null when no avatar is set', function () {
    $user = new User(['avatar_url' => null]);

    expect($user->getFilamentAvatarUrl())->toBeNull();
});

test('canAccessPanel returns true for active users', function () {
    $user = new User(['active' => true]);
    $panel = app(Panel::class);

    expect($user->canAccessPanel($panel))->toBeTrue();
});

test('canAccessPanel returns false for inactive users', function () {
    $user = new User(['active' => false]);
    $panel = app(Panel::class);

    expect($user->canAccessPanel($panel))->toBeFalse();
});

test('user factory creates active users by default', function () {
    $user = User::factory()->create();

    expect($user->active)->toBeTrue();
});

test('user factory inactive state creates inactive user', function () {
    $user = User::factory()->inactive()->create();

    expect($user->active)->toBeFalse();
});

test('user has many tasks', function () {
    $user = User::factory()->create();
    Task::factory()->count(3)->create(['user_id' => $user->id]);

    expect($user->tasks)->toHaveCount(3);
});

test('user tasks relationship only returns own tasks', function () {
    $user = User::factory()->create();
    $other = User::factory()->create();
    Task::factory()->count(2)->create(['user_id' => $user->id]);
    Task::factory()->count(3)->create(['user_id' => $other->id]);

    expect($user->tasks)->toHaveCount(2);
});
