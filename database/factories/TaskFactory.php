<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'status' => fake()->randomElement(['todo', 'in_progress', 'completed']),
            'description' => fake()->optional()->paragraph(),
            'position' => fake()->numberBetween(0, 100),
            'user_id' => User::factory(),
        ];
    }

    public function todo(): static
    {
        return $this->state(fn (array $attributes) => ['status' => 'todo']);
    }

    public function inProgress(): static
    {
        return $this->state(fn (array $attributes) => ['status' => 'in_progress']);
    }

    public function completed(): static
    {
        return $this->state(fn (array $attributes) => ['status' => 'completed']);
    }
}
