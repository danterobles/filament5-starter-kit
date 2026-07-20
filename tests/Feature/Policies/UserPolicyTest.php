<?php

use App\Models\User;
use App\Policies\UserPolicy;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

beforeEach(function () {
    app()[PermissionRegistrar::class]->forgetCachedPermissions();
});

dataset('user_policy_methods', [
    'viewAny' => ['viewAny', 'ViewAny:User'],
    'view' => ['view', 'View:User'],
    'create' => ['create', 'Create:User'],
    'update' => ['update', 'Update:User'],
    'delete' => ['delete', 'Delete:User'],
    'deleteAny' => ['deleteAny', 'DeleteAny:User'],
    'restore' => ['restore', 'Restore:User'],
    'restoreAny' => ['restoreAny', 'RestoreAny:User'],
    'forceDelete' => ['forceDelete', 'ForceDelete:User'],
    'forceDeleteAny' => ['forceDeleteAny', 'ForceDeleteAny:User'],
    'replicate' => ['replicate', 'Replicate:User'],
    'reorder' => ['reorder', 'Reorder:User'],
]);

test('user with permission can perform action', function (string $method, string $permission) {
    Permission::create(['name' => $permission, 'guard_name' => 'web']);
    $user = User::factory()->create();
    $user->givePermissionTo($permission);
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    expect((new UserPolicy)->{$method}($user))->toBeTrue();
})->with('user_policy_methods');

test('user without permission cannot perform action', function (string $method) {
    $user = User::factory()->create();

    expect((new UserPolicy)->{$method}($user))->toBeFalse();
})->with([
    'viewAny' => ['viewAny'],
    'view' => ['view'],
    'create' => ['create'],
    'update' => ['update'],
    'delete' => ['delete'],
    'deleteAny' => ['deleteAny'],
    'restore' => ['restore'],
    'restoreAny' => ['restoreAny'],
    'forceDelete' => ['forceDelete'],
    'forceDeleteAny' => ['forceDeleteAny'],
    'replicate' => ['replicate'],
    'reorder' => ['reorder'],
]);
