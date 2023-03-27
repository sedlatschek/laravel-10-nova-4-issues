<?php

namespace Database\Factories;

use App\Models\Deadline;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deadline>
 */
class DeadlineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $exceeds_at = $this->faker->dateTimeBetween('-3 months', '3 months');
        return [
            'exceeds_at' => $exceeds_at,
            'postponed_id' => $this->faker->boolean(30)
                ? Deadline::factory()->create([
                    'exceeds_at' => $this->faker->dateTimeBetween($exceeds_at, '3 months'),
                ])
                : null
        ];
    }
}
