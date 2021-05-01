<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Degree;
use Faker\Generator as Faker;

$factory->define(Degree::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
