<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'company_id' => 1,
        'description' => $faker->paragraph,
        'status' => $faker->numberBetween(0, 1),
        'expire_date' => $faker->dateTimeThisYear(),
    ];
});
