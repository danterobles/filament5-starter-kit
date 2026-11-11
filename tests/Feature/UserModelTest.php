<?php

use App\Models\Task;
use App\Models\User;
use Filament\Panel;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

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

test('orderByFullName sorts by name and then by last using qualified columns', function () {
    User::factory()->create(['name' => 'Bruno', 'last' => 'Zamora']);
    User::factory()->create(['name' => 'Ana', 'last' => 'Perez']);
    User::factory()->create(['name' => 'Ana', 'last' => 'Lopez']);

    $query = User::query()->orderByFullName();

    expect($query->toSql())->toContain('"users"."name" asc, "users"."last" asc')
        ->and($query->get()->map->full_name->all())->toBe(['Ana Lopez', 'Ana Perez', 'Bruno Zamora'])
        ->and(User::query()->orderByFullName('desc')->first()->full_name)->toBe('Bruno Zamora');
});

test('canAssignRole only lets a super_admin assign the super_admin role', function () {
    $superAdminRole = Role::create(['name' => 'super_admin', 'guard_name' => 'web']);
    $otherRole = Role::create(['name' => 'panel_user', 'guard_name' => 'web']);

    $regular = User::factory()->create();
    $superAdmin = User::factory()->create();
    $superAdmin->assignRole($superAdminRole);

    expect($regular->canAssignRole(null))->toBeTrue()
        ->and($regular->canAssignRole($otherRole->id))->toBeTrue()
        ->and($regular->canAssignRole($superAdminRole->id))->toBeFalse()
        ->and($regular->canAssignRole((string) $superAdminRole->id))->toBeFalse()
        ->and($superAdmin->canAssignRole($superAdminRole->id))->toBeTrue();
});

test('canAssignRole refuses roles that carry permissions the assigner does not hold', function () {
    Permission::create(['name' => 'View:User', 'guard_name' => 'web']);
    Permission::create(['name' => 'Delete:User', 'guard_name' => 'web']);
    $limited = Role::create(['name' => 'limited', 'guard_name' => 'web']);
    $limited->givePermissionTo('View:User');
    $powerful = Role::create(['name' => 'powerful', 'guard_name' => 'web']);
    $powerful->givePermissionTo('View:User', 'Delete:User');

    $assigner = User::factory()->create();
    $assigner->givePermissionTo('View:User');
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    expect($assigner->canAssignRole($limited->id))->toBeTrue()
        ->and($assigner->canAssignRole($powerful->id))->toBeFalse()
        ->and($assigner->canAssignRole(999999))->toBeFalse();
});

test('canManage lets a user manage only users whose permissions are a subset of their own', function () {
    Permission::create(['name' => 'View:User', 'guard_name' => 'web']);
    Permission::create(['name' => 'Delete:User', 'guard_name' => 'web']);
    Role::create(['name' => 'super_admin', 'guard_name' => 'web']);

    $limited = User::factory()->create();
    $limited->givePermissionTo('View:User');
    $powerful = User::factory()->create();
    $powerful->givePermissionTo('View:User', 'Delete:User');
    $superAdmin = User::factory()->create();
    $superAdmin->assignRole('super_admin');
    $nobody = User::factory()->create();
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    expect($powerful->canManage($limited))->toBeTrue()
        ->and($limited->canManage($powerful))->toBeFalse()
        ->and($limited->canManage($nobody))->toBeTrue()
        ->and($limited->canManage($superAdmin))->toBeFalse()
        ->and($superAdmin->canManage($powerful))->toBeTrue();
});
