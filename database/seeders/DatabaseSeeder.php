<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Feedback;
use App\Models\Post;
use App\Models\Supply;
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
        Supply::factory(30)->create();

        User::factory(['email' => 'lukas@moessler.com', 'username' => 'leluke'])->withPosts()->create();
        User::factory(10)->withPosts()->withBans()->create();

        Post::get()->map(
            fn($p) => $p->supplies()->attach(
                Supply::inRandomOrder()->take(5)->pluck('id')->toArray()
            )
        );

        Post::get()->map(
            fn ($post) => $post->categories()->attach(
                Category::inRandomOrder()->take(5)->pluck('id')->toArray()
            )
        );


        User::get()->map(
            fn ($user) => collect(range(1, 3))->map(
                fn () => Feedback::factory()->create([
                    'user_id' => User::where('id', '!=', $user->id)
                    ->inRandomOrder()->first()->id,
                    'feedbackable_id' => $user->id,
                    'feedbackable_type' => 'App\Models\User',
                ])
            )
        );

        Post::get()->map(
            fn ($post) => collect(range(1, 3))->map(
                fn () => Feedback::factory()->create([
                    'user_id' => User::inRandomOrder()->first()->id,
                    'feedbackable_id' => $post->id,
                    'feedbackable_type' => 'App\Models\Post',
                ])
            )
        );

        /* Post::inRandomOrder()->get()->map(function($post) { */
        /*     $post->requestedByUsers()->attach( */
        /*         User::inRandomOrder()->first()->id, */
        /*         ['status' => */
        /*             ['pending', */
        /*             'accepted', */
        /*             'rejected'] */
        /*             [rand(0,2)]] */
        /*     ); */
        /* }); */
        Post::inRandomOrder()->get()->map(function($post) {
            for($i = 0; $i < 10; $i++){
            $post->requestedByUsers()->attach(
                User::inRandomOrder()->first()->id,
                ['status' =>'pending']
            );
            }
        });

    }
}
