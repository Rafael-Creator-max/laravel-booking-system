<?php

namespace Database\Factories;

use App\Models\Trip;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'trip_id' => Trip::factory(), 
        'name' => $this->faker->name(),
        'email' => $this->faker->safeEmail(),
        'number_of_people' => $this->faker->numberBetween(1, 5),
        'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
        ];
    }
}
