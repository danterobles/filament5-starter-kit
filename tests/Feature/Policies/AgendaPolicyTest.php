<?php

use App\Models\Agenda;
use App\Models\User;
use App\Policies\AgendaPolicy;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

beforeEach(function () {
    app()[PermissionRegistrar::class]->forgetCachedPermissions();
});

dataset('agenda_policy_methods_without_model', [
    'viewAny' => ['viewAny', 'ViewAny:Agenda'],
    'create' => ['create', 'Create:Agenda'],
    'deleteAny' => ['deleteAny', 'DeleteAny:Agenda'],
    'restoreAny' => ['restoreAny', 'RestoreAny:Agenda'],
    'forceDeleteAny' => ['forceDeleteAny', 'ForceDeleteAny:Agenda'],
    'reorder' => ['reorder', 'Reorder:Agenda'],
]);

dataset('agenda_policy_methods_with_model', [
    'view' => ['view', 'View:Agenda'],
    'update' => ['update', 'Update:Agenda'],
    'delete' => ['delete', 'Delete:Agenda'],
    'restore' => ['restore', 'Restore:Agenda'],
    'forceDelete' => ['forceDelete', 'ForceDelete:Agenda'],
    'replicate' => ['replicate', 'Replicate:Agenda'],
]);

test('user with permission can perform action (no model)', function (string $method, string $permission) {
    Permission::create(['name' => $permission, 'guard_name' => 'web']);
    $user = User::factory()->create();
    $user->givePermissionTo($permission);
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    expect((new AgendaPolicy)->{$method}($user))->toBeTrue();
})->with('agenda_policy_methods_without_model');

test('user without permission cannot perform action (no model)', function (string $method) {
    $user = User::factory()->create();

    expect((new AgendaPolicy)->{$method}($user))->toBeFalse();
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

    $agenda = Agenda::factory()->create();

    expect((new AgendaPolicy)->{$method}($user, $agenda))->toBeTrue();
})->with('agenda_policy_methods_with_model');

test('user without permission cannot perform action (with model)', function (string $method) {
    $user = User::factory()->create();
    $agenda = Agenda::factory()->create();

    expect((new AgendaPolicy)->{$method}($user, $agenda))->toBeFalse();
})->with([
    'view' => ['view'],
    'update' => ['update'],
    'delete' => ['delete'],
    'restore' => ['restore'],
    'forceDelete' => ['forceDelete'],
    'replicate' => ['replicate'],
]);
