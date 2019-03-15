<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    $users = App\User::pluck('id')->toArray();
    $categories = App\Category::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'category_id' => $faker->randomElement($categories),
        'name' => $title,
        'slug' => Str::slug($title, '-'),
        'excerpt' => $faker->text(200),
        'body' => $faker->text(500),
        'file' => $faker->imageUrl($width = 1200, $height = 400),
        'status' => $faker->randomElement(['DRAFT', 'PUBLISHED']),
    ];
});
