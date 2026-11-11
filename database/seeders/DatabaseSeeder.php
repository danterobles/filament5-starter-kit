<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use RuntimeException;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $email = app()->environment(['local', 'testing'])
            ? (config('starterkit.admin_seed_email') ?: 'starterkit@mailinator.com')
            : config('starterkit.admin_seed_email');

        if (blank($email)) {
            throw new RuntimeException('Set ADMIN_SEED_EMAIL to a mailbox you control before seeding outside local and testing.');
        }

        $this->call(ShieldSeeder::class);

        // The fixed "demo" password is only safe for local development and
        // automated tests. Outside those environments, use an explicit
        // ADMIN_SEED_PASSWORD or fall back to a random, unguessable one.
        $password = app()->environment(['local', 'testing'])
            ? 'demo'
            : (config('starterkit.admin_seed_password') ?: Str::password(32));

        $admin = User::create([
            'name' => 'Administrator',
            'last' => 'Starterkit',
            'phone' => '+528100000000',
            'password' => Hash::make($password),
            'active' => true,
            'email' => $email,
        ]);

        $admin->assignRole('super_admin');

        if (app()->environment('local')) {
            $this->call([TaskSeeder::class, AgendaSeeder::class]);
        }

        if (! app()->environment(['local', 'testing']) && blank(config('starterkit.admin_seed_password'))) {
            $this->command?->info("Admin seeded with a random password: {$password}");
        }
    }
}
