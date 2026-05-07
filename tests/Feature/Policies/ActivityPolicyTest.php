<?php

use App\Models\User;
use App\Policies\ActivityPolicy;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

beforeEach(function () {
    app()[PermissionRegistrar::class]->forgetCachedPermissions();
});

// Methods that receive no model instance
dataset('activity_no_model', [
    'viewAny' => ['viewAny', 'ViewAny:Activity'],
    'create' => ['create', 'Create:Activity'],
    'deleteAny' => ['deleteAny', 'DeleteAny:Activity'],
    'restoreAny' => ['restoreAny', 'RestoreAny:Activity'],
    'forceDeleteAny' => ['forceDeleteAny', 'ForceDeleteAny:Activity'],
    'reorder' => ['reorder', 'Reorder:Activity'],
]);

// Methods that receive an Activity model instance
dataset('activity_with_model', [
    'view' => ['view', 'View:Activity'],
    'update' => ['update', 'Update:Activity'],
    'delete' => ['delete', 'Delete:Activity'],
    'restore' => ['restore', 'Restore:Activity'],
    'forceDelete' => ['forceDelete', 'ForceDelete:Activity'],
    'replicate' => ['replicate', 'Replicate:Activity'],
]);

test('user with permission can call policy method (no model)', function (string $method, string $permission) {
    Permission::create(['name' => $permission, 'guard_name' => 'web']);
    $user = User::factory()->create();
    $user->givePermissionTo($permission);
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    expect((new ActivityPolicy)->{$method}($user))->toBeTrue();
})->with('activity_no_model');

test('user without permission is denied (no model)', function (string $method) {
    $user = User::factory()->create();

    expect((new ActivityPolicy)->{$method}($user))->toBeFalse();
})->with([
    'viewAny' => ['viewAny'],
    'create' => ['create'],
    'deleteAny' => ['deleteAny'],
    'restoreAny' => ['restoreAny'],
    'forceDeleteAny' => ['forceDeleteAny'],
    'reorder' => ['reorder'],
]);

test('user with permission can call policy method (with model)', function (string $method, string $permission) {
    Permission::create(['name' => $permission, 'guard_name' => 'web']);
    $user = User::factory()->create();
    $user->givePermissionTo($permission);
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    expect((new ActivityPolicy)->{$method}($user, new Activity))->toBeTrue();
})->with('activity_with_model');

test('user without permission is denied (with model)', function (string $method) {
    $user = User::factory()->create();

    expect((new ActivityPolicy)->{$method}($user, new Activity))->toBeFalse();
})->with([
    'view' => ['view'],
    'update' => ['update'],
    'delete' => ['delete'],
    'restore' => ['restore'],
    'forceDelete' => ['forceDelete'],
    'replicate' => ['replicate'],
]);
