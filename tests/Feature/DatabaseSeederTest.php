<?php

use App\Models\User;
use Database\Seeders\DatabaseSeeder;

use function Pest\Laravel\seed;

test('seeding creates the admin user with the super_admin role assigned', function () {
    seed(DatabaseSeeder::class);

    $admin = User::where('email', 'starterkit@mailinator.com')->first();

    expect($admin)->not->toBeNull()
        ->and($admin->hasRole('super_admin'))->toBeTrue();
});
