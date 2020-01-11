<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/**
 * php artisan make:factory PostFactory -m Post
 *
 * factory(App\Post::class, 5)->create();
 * factory(App\Post::class, 5)->create(['user_id' => 1]);
 */
$factory->define(Post::class, function (Faker $faker) {

    $title = $faker->sentence;

    return [
        'user_id' => factory(App\User::class),
        'slug' => str::slug($title),
        'title' => $title,
        'body' => $faker->paragraph
    ];
});
