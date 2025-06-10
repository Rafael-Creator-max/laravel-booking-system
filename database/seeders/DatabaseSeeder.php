<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Trip;
use App\Models\Booking;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $regions = ['west', 'east', 'north', 'central'];

        // Maak minstens 1 trip per regio aan, elk met 4 bookings
        foreach ($regions as $region) {
        Trip::factory()
            ->state(['region' => $region])
            ->has(\App\Models\Booking::factory()->count(4))
            ->create();
        }

         // Voeg 2 extra trips toe met 4 bookings elk
        Trip::factory()
            ->count(2)
            ->has(\App\Models\Booking::factory()->count(4))
            ->create();
        
    }
}
