<?php

use App\Models\Agenda;
use App\Models\Task;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Hash;

use function Pest\Laravel\seed;

test('seeding creates the admin user with the super_admin role assigned', function () {
    seed(DatabaseSeeder::class);

    $admin = User::where('email', 'starterkit@mailinator.com')->first();

    expect($admin)->not->toBeNull()
        ->and($admin->hasRole('super_admin'))->toBeTrue();
});

test('outside local and testing the admin password comes from the starterkit config', function () {
    app()->detectEnvironment(fn (): string => 'production');
    config(['starterkit.admin_seed_password' => 'from-config-secret']);

    $this->artisan('db:seed', ['--force' => true]);

    $admin = User::where('email', 'starterkit@mailinator.com')->first();

    expect(Hash::check('from-config-secret', $admin->password))->toBeTrue()
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
