<?php

namespace Database\Factories;

use App\Models\Agenda;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Agenda>
 */
class AgendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('now', '+2 months');
        $colors = ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6', '#ec4899', '#06b6d4'];

        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence(3, false),
            'description' => fake()->optional(0.7)->paragraph(),
            'start_date' => $start,
            'end_date' => fake()->optional(0.8)->dateTimeBetween($start, (clone $start)->modify('+3 hours')),
            'all_day' => fake()->boolean(20),
            'color' => fake()->randomElement($colors),
            'location' => fake()->optional(0.5)->city(),
        ];
    }

    public function allDay(): static
    {
        return $this->state(fn (array $attributes) => [
            'all_day' => true,
            'end_date' => null,
        ]);
    }

    public function upcoming(): static
    {
        return $this->state(fn (array $attributes) => [
            'start_date' => fake()->dateTimeBetween('now', '+1 week'),
        ]);
    }
}
