<?php

namespace Database\Seeders;

use App\Models\Agenda;
use App\Models\User;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    /**
     * Seed demo agenda events for the first user (local development only).
     */
    public function run(): void
    {
        $user = User::query()->oldest('id')->first();

        if ($user === null) {
            return;
        }

        Agenda::factory()->count(5)->for($user)->create();
    }
}
