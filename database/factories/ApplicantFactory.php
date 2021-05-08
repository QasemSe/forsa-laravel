<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Applicant;
use Faker\Generator as Faker;

$factory->define(Applicant::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'post_id' => $faker->numberBetween(4, 8),
        'notes' => $faker->paragraph,
        'status' => 'review',
    ];
});
