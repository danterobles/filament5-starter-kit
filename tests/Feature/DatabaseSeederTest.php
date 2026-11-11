<?php

use App\Models\Agenda;
use App\Models\Task;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use function Pest\Laravel\seed;

test('seeding creates the admin user with the super_admin role assigned', function () {
    seed(DatabaseSeeder::class);

    $admin = User::where('email', 'starterkit@mailinator.com')->first();

    expect($admin)->not->toBeNull()
        ->and($admin->hasRole('super_admin'))->toBeTrue();
});

test('outside local and testing the admin password comes from the starterkit config', function () {
    app()->detectEnvironment(fn (): string => 'production');
    config([
        'starterkit.admin_seed_password' => 'from-config-secret',
        'starterkit.admin_seed_email' => 'owner@example.com',
    ]);

    $this->artisan('db:seed', ['--force' => true]);

    $admin = User::where('email', 'owner@example.com')->first();

    expect(User::where('email', 'starterkit@mailinator.com')->exists())->toBeFalse()
        ->and(Hash::check('from-config-secret', $admin->password))->toBeTrue()
        ->and(Task::withoutGlobalScopes()->count())->toBe(0)
        ->and(Agenda::withoutGlobalScopes()->count())->toBe(0);
});

test('seeding in the local environment also creates demo tasks and agenda events for the admin', function () {
    app()->detectEnvironment(fn (): string => 'local');

    seed(DatabaseSeeder::class);

    $admin = User::where('email', 'starterkit@mailinator.com')->first();

    expect(Task::withoutGlobalScopes()->where('user_id', $admin->id)->count())->toBeGreaterThan(0)
        ->and(Agenda::withoutGlobalScopes()->where('user_id', $admin->id)->count())->toBeGreaterThan(0);
});

test('seeding outside local and testing refuses to run without an admin email', function () {
    app()->detectEnvironment(fn (): string => 'production');
    config(['starterkit.admin_seed_email' => null]);

    expect(fn () => $this->artisan('db:seed', ['--force' => true])->run())
        ->toThrow(RuntimeException::class, 'ADMIN_SEED_EMAIL');

    expect(User::count())->toBe(0);
});

test('two-factor authentication is forced only for super_admins and only when enabled in config', function () {
    Filament::setCurrentPanel('admin');
    Role::create(['name' => 'super_admin', 'guard_name' => 'web']);

    $superAdmin = User::factory()->create();
    $superAdmin->assignRole('super_admin');
    $regular = User::factory()->create();
    $breezy = filament('filament-breezy');

    config(['starterkit.require_super_admin_two_factor' => true]);
    $this->actingAs($superAdmin);
    expect($breezy->shouldForceTwoFactor())->toBeTrue();
    $this->actingAs($regular);
    expect($breezy->shouldForceTwoFactor())->toBeFalse();

    config(['starterkit.require_super_admin_two_factor' => false]);
    $this->actingAs($superAdmin);
    expect($breezy->shouldForceTwoFactor())->toBeFalse();
});
