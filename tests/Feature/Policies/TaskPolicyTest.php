<?php

use App\Models\Task;
use App\Models\User;
use App\Policies\TaskPolicy;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

beforeEach(function () {
    app()[PermissionRegistrar::class]->forgetCachedPermissions();
});

dataset('task_policy_methods_without_model', [
    'viewAny' => ['viewAny', 'ViewAny:Task'],
    'create' => ['create', 'Create:Task'],
    'deleteAny' => ['deleteAny', 'DeleteAny:Task'],
    'restoreAny' => ['restoreAny', 'RestoreAny:Task'],
    'forceDeleteAny' => ['forceDeleteAny', 'ForceDeleteAny:Task'],
    'reorder' => ['reorder', 'Reorder:Task'],
]);

dataset('task_policy_methods_with_model', [
    'view' => ['view', 'View:Task'],
    'update' => ['update', 'Update:Task'],
    'delete' => ['delete', 'Delete:Task'],
    'restore' => ['restore', 'Restore:Task'],
    'forceDelete' => ['forceDelete', 'ForceDelete:Task'],
    'replicate' => ['replicate', 'Replicate:Task'],
]);

test('user with permission can perform action (no model)', function (string $method, string $permission) {
    Permission::create(['name' => $permission, 'guard_name' => 'web']);
    $user = User::factory()->create();
    $user->givePermissionTo($permission);
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    expect((new TaskPolicy)->{$method}($user))->toBeTrue();
})->with('task_policy_methods_without_model');

test('user without permission cannot perform action (no model)', function (string $method) {
    $user = User::factory()->create();

    expect((new TaskPolicy)->{$method}($user))->toBeFalse();
})->with([
    'viewAny' => ['viewAny'],
    'create' => ['create'],
    'deleteAny' => ['deleteAny'],
    'restoreAny' => ['restoreAny'],
    'forceDeleteAny' => ['forceDeleteAny'],
    'reorder' => ['reorder'],
]);

test('user with permission can perform action (with model)', function (string $method, string $permission) {
    Permission::create(['name' => $permission, 'guard_name' => 'web']);
    $user = User::factory()->create();
    $user->givePermissionTo($permission);
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    $task = Task::factory()->create();

    expect((new TaskPolicy)->{$method}($user, $task))->toBeTrue();
})->with('task_policy_methods_with_model');

test('user without permission cannot perform action (with model)', function (string $method) {
    $user = User::factory()->create();
    $task = Task::factory()->create();

    expect((new TaskPolicy)->{$method}($user, $task))->toBeFalse();
})->with([
    'view' => ['view'],
    'update' => ['update'],
    'delete' => ['delete'],
    'restore' => ['restore'],
    'forceDelete' => ['forceDelete'],
    'replicate' => ['replicate'],
]);
