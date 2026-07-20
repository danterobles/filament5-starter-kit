<?php

use App\Models\Agenda;
use App\Models\Task;
use App\Models\User;
use Spatie\Permission\Models\Role;

dataset('owned_models', [
    'Task' => [Task::class],
    'Agenda' => [Agenda::class],
]);

test('a regular user only sees their own records', function (string $model) {
    $owner = User::factory()->create();
    $other = User::factory()->create();

    $ownRecord = $model::factory()->for($owner)->create();
    $model::factory()->for($other)->create();

    $this->actingAs($owner);

    expect($model::pluck('id'))->toEqual(collect([$ownRecord->id]));
})->with('owned_models');

test('super_admin sees every record regardless of owner', function (string $model) {
    Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
    $admin = User::factory()->create();
    $admin->assignRole('super_admin');

    $model::factory()->count(2)->create();

    $this->actingAs($admin);

    expect($model::count())->toBe(2);
})->with('owned_models');

test('records are unscoped outside an authenticated context', function (string $model) {
    $model::factory()->count(2)->create();

    expect($model::count())->toBe(2);
})->with('owned_models');
