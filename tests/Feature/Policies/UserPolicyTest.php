<?php

use App\Models\User;
use App\Policies\UserPolicy;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
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

    expect((new UserPolicy)->{$method}($user, User::factory()->create()))->toBeTrue();
})->with('user_policy_methods');

test('user without permission cannot perform action', function (string $method) {
    $user = User::factory()->create();

    expect((new UserPolicy)->{$method}($user, User::factory()->create()))->toBeFalse();
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

test('a user with Update:User permission cannot update a super_admin unless they are super_admin too', function () {
    Permission::create(['name' => 'Update:User', 'guard_name' => 'web']);
    Role::create(['name' => 'super_admin', 'guard_name' => 'web']);

    $actor = User::factory()->create();
    $actor->givePermissionTo('Update:User');
    $superAdmin = User::factory()->create();
    $superAdmin->assignRole('super_admin');
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    expect((new UserPolicy)->update($actor, $superAdmin))->toBeFalse();

    $actor->assignRole('super_admin');
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    expect((new UserPolicy)->update($actor->refresh(), $superAdmin))->toBeTrue();
});

test('a user with Delete:User permission cannot delete a super_admin unless they are super_admin too', function () {
    Permission::create(['name' => 'Delete:User', 'guard_name' => 'web']);
    Role::create(['name' => 'super_admin', 'guard_name' => 'web']);

    $actor = User::factory()->create();
    $actor->givePermissionTo('Delete:User');
    $superAdmin = User::factory()->create();
    $superAdmin->assignRole('super_admin');
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    expect((new UserPolicy)->delete($actor, $superAdmin))->toBeFalse();

    $actor->assignRole('super_admin');
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    expect((new UserPolicy)->delete($actor->refresh(), $superAdmin))->toBeTrue();
});
