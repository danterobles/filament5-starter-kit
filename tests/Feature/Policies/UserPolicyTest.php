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
    'deleteAny' => ['deleteAny'],
    'restore' => ['restore'],
    'restoreAny' => ['restoreAny'],
    'forceDelete' => ['forceDelete'],
    'forceDeleteAny' => ['forceDeleteAny'],
    'replicate' => ['replicate'],
    'reorder' => ['reorder'],
]);

test('a user with Delete:User permission can delete a different user', function () {
    Permission::create(['name' => 'Delete:User', 'guard_name' => 'web']);
    $actor = User::factory()->create();
    $actor->givePermissionTo('Delete:User');
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    $target = User::factory()->create();

    expect((new UserPolicy)->delete($actor, $target))->toBeTrue();
});

test('a user without Delete:User permission cannot delete a different user', function () {
    $actor = User::factory()->create();
    $target = User::factory()->create();

    expect((new UserPolicy)->delete($actor, $target))->toBeFalse();
});

test('a user with Delete:User permission cannot delete their own account', function () {
    Permission::create(['name' => 'Delete:User', 'guard_name' => 'web']);
    $actor = User::factory()->create();
    $actor->givePermissionTo('Delete:User');
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    expect((new UserPolicy)->delete($actor, $actor))->toBeFalse();
});
