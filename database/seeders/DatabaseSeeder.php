<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ShieldSeeder::class);

        $admin = User::create([
            'name' => 'Administrator',
            'last' => 'Starterkit',
            'phone' => '+528100000000',
            'password' => Hash::make('demo'),
            'active' => true,
            'email' => 'starterkit@mailinator.com',
        ]);

        $admin->assignRole('super_admin');
    }
}
