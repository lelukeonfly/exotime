<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Demand;
use App\Models\Feedback;
use App\Models\Service;
use App\Models\Supply;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = rand(0, 1) === 0 ? Service::class : Demand::class;
        $postable = $this->factoryForModel($type)->create();

        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'duration_min' => $this->faker->numberBetween(15,120),
            'preferred_location' => $this->faker->word(),
            'status' => $this->faker->word(),
            'postable_id' => $postable->id,
            'postable_type' => get_class($postable),
        ];
    }

    public function withSupplies($count = 3)
    {
        return $this->has(
            Supply::factory()->count($count),
            'supplies'
        );
    }

    public function withCategories($count = 3)
    {
        return $this->has(
            Category::factory()->count($count),
            'categories'
        );
    }

    public function withFeedbacks($count = 3)
    {
        return $this->has(
            Feedback::factory()->count($count),
            'feedbacks'
        );
    }
}
