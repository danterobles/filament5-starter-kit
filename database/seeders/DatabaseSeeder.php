<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ShieldSeeder::class);

        // The fixed "demo" password is only safe for local development and
        // automated tests. Outside those environments, use an explicit
        // ADMIN_SEED_PASSWORD or fall back to a random, unguessable one.
        $password = app()->environment(['local', 'testing'])
            ? 'demo'
            : (env('ADMIN_SEED_PASSWORD') ?: Str::password(32));

        $admin = User::create([
            'name' => 'Administrator',
            'last' => 'Starterkit',
            'phone' => '+528100000000',
            'password' => Hash::make($password),
            'active' => true,
            'email' => 'starterkit@mailinator.com',
        ]);

        $admin->assignRole('super_admin');

        if (! app()->environment(['local', 'testing']) && blank(env('ADMIN_SEED_PASSWORD'))) {
            $this->command?->info("Admin seeded with a random password: {$password}");
        }
    }
}
