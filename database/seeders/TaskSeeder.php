<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Seed demo tasks for the first user (local development only).
     */
    public function run(): void
    {
        $user = User::query()->oldest('id')->first();

        if ($user === null) {
            return;
        }

        Task::factory()->count(3)->todo()->for($user)->create();
        Task::factory()->count(2)->inProgress()->for($user)->create();
        Task::factory()->count(2)->completed()->for($user)->create();
        Task::factory()->count(2)->overdue()->inProgress()->for($user)->create();
    }
}
