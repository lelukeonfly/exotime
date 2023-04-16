<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Demand>
 */
class DemandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            /* 'location' => fake()->name(), */
            /* 'duration_min' => fake()->numberBetween(30,180), */
            /* 'starting_at' => fake()->date(), */
            /* 'ending_at' => fake()->date(), */
        ];
    }
}
