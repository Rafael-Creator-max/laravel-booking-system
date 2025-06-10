<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'title' => $this->faker->sentence(3),
        'region' => $this->faker->randomElement(['west', 'east', 'north', 'central']),
        'start_date' => $this->faker->dateTimeBetween('+1 week', '+6 months'),
        'duration_days' => $this->faker->numberBetween(1, 14),
        'price_per_person' => $this->faker->randomFloat(2, 50, 500),
        ];
    }
}
