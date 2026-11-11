<?php

use App\Models\User;
use App\Policies\RolePolicy;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

beforeEach(function () {
    app()[PermissionRegistrar::class]->forgetCachedPermissions();
});

dataset('role_policy_methods_without_model', [
    'viewAny' => ['viewAny', 'ViewAny:Role'],
    'create' => ['create', 'Create:Role'],
    'deleteAny' => ['deleteAny', 'DeleteAny:Role'],
    'restoreAny' => ['restoreAny', 'RestoreAny:Role'],
    'forceDeleteAny' => ['forceDeleteAny', 'ForceDeleteAny:Role'],
    'reorder' => ['reorder', 'Reorder:Role'],
]);

dataset('role_policy_methods_with_model', [
    'view' => ['view', 'View:Role'],
    'update' => ['update', 'Update:Role'],
    'delete' => ['delete', 'Delete:Role'],
    'restore' => ['restore', 'Restore:Role'],
    'forceDelete' => ['forceDelete', 'ForceDelete:Role'],
    'replicate' => ['replicate', 'Replicate:Role'],
]);

test('user with permission can perform action (no model)', function (string $method, string $permission) {
    Permission::create(['name' => $permission, 'guard_name' => 'web']);
    $user = User::factory()->create();
    $user->givePermissionTo($permission);
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    expect((new RolePolicy)->{$method}($user))->toBeTrue();
})->with('role_policy_methods_without_model');

test('user without permission cannot perform action (no model)', function (string $method) {
    $user = User::factory()->create();

    expect((new RolePolicy)->{$method}($user))->toBeFalse();
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

    $role = Role::firstOrCreate(['name' => 'test_role', 'guard_name' => 'web']);

    expect((new RolePolicy)->{$method}($user, $role))->toBeTrue();
})->with('role_policy_methods_with_model');

test('user without permission cannot perform action (with model)', function (string $method) {
    $user = User::factory()->create();
    $role = Role::firstOrCreate(['name' => 'test_role', 'guard_name' => 'web']);

    expect((new RolePolicy)->{$method}($user, $role))->toBeFalse();
})->with([
    'view' => ['view'],
    'update' => ['update'],
    'delete' => ['delete'],
    'restore' => ['restore'],
    'forceDelete' => ['forceDelete'],
    'replicate' => ['replicate'],
]);

test('only a super_admin can update the super_admin role', function () {
    Permission::create(['name' => 'Update:Role', 'guard_name' => 'web']);
    $superAdminRole = Role::create(['name' => 'super_admin', 'guard_name' => 'web']);

    $actor = User::factory()->create();
    $actor->givePermissionTo('Update:Role');
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    expect((new RolePolicy)->update($actor, $superAdminRole))->toBeFalse()
        ->and((new RolePolicy)->update($actor, Role::create(['name' => 'editor', 'guard_name' => 'web'])))->toBeTrue();

    $actor->assignRole($superAdminRole);
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    expect((new RolePolicy)->update($actor->refresh(), $superAdminRole))->toBeTrue();
});

test('the super_admin role can never be deleted, not even by a super_admin', function () {
    Permission::create(['name' => 'Delete:Role', 'guard_name' => 'web']);
    $superAdminRole = Role::create(['name' => 'super_admin', 'guard_name' => 'web']);
    $superAdminRole->givePermissionTo('Delete:Role');

    $superAdmin = User::factory()->create();
    $superAdmin->assignRole($superAdminRole);
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    expect((new RolePolicy)->delete($superAdmin->refresh(), $superAdminRole))->toBeFalse();
});
