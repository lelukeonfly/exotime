<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Feedback;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(10)->create();

        //User::factory(10)->withPosts()->create();
        User::factory(10)->withPosts()->withBans()->create();

        Post::get()->map(
            fn ($post) => $post->categories()->attach(Category::inRandomOrder()->take(3)->pluck('id')->toArray())
        );

        // For each User map through (returns a collection)
        // and create a collection with 3 entries
        // map through these 3 and return a new collection
        // for every collection create a Feedback with it's factory
        // where you shuffle the Users and pick the id of the first one
        // but it can't be the User itself that gives himself Feedback
        // Also set the relation properties for each collection
    //
        User::get()->map(
            fn ($user) => collect(range(1, 3))->map(
                fn () => Feedback::factory()->create([
                    'user_id' => User::where('id', '!=', $user->id)->inRandomOrder()->first()->id,
                    'feedbackable_id' => $user->id,
                    'feedbackable_type' => 'App\Models\User',
                ])
            )
        );

        // For each Post map through (returns a collection)
        // and create a collection with 3 entries
        // map through these 3 and return a new collection
        // for every collection create a Feedback with it's factory
        // where you shuffle the Users and pick the id of the first one
        // Also set the relation properties for each collection
    //
        Post::get()->map(
            fn ($post) => collect(range(1, 3))->map(
                fn () => Feedback::factory()->create([
                    'user_id' => User::inRandomOrder()->first()->id,
                    'feedbackable_id' => $post->id,
                    'feedbackable_type' => 'App\Models\Post',
                ])
            )
        );
    }
}
