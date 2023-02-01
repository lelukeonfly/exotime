<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ban>
 */
class BanFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'ban_reason' => $this->faker->realText(50),
      'banned_until' => $this->faker->dateTimeBetween("2022-05-01", "2024-05-30"),
    ];
  }
}
