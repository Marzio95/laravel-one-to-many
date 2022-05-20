<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use App\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++) {
            $title = $faker->word(rand(4, 8), true);
            Post::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'title' => $title,
                'postText' => $faker->text(rand(100, 500)),
                'slug' => Post::createSlug($title),
            ]);
        }
    }
}
