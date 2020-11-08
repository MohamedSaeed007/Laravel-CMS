<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $filePath = public_path('storage/public/posts');

    return [
        'title' => $faker->sentence(6),
        'description' => $faker->paragraph(4),
        'content' => $faker->paragraph(6),
        'image' => $faker->image($filePath,300,400),
    ];
});
