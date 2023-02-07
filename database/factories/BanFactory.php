<?php

namespace Database\Factories;

use App\Models\PermanentBan;
use App\Models\TemporaryBan;
use App\Models\UnBan;
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
    $type = match (rand(0, 2)) {
      0 => TemporaryBan::class,
      1 => PermanentBan::class,
      2 => UnBan::class,
    };

    $bannable = $this->factoryForModel($type)->create();

    return [
      'reason' => $this->faker->realText(50),
      'bannable_id' => $bannable->id,
      'bannable_type' => get_class($bannable),
      'created_at' => $this->faker->dateTime(),
      #'banned_until' => $this->faker->dateTimeBetween("2022-05-01", "2024-05-30"),
    ];
  }
}
