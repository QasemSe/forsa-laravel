<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'mobile_number' => $faker->phoneNumber(),
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->city,
        'state' => $faker->city,
        'description' => $faker->paragraph,
        'password' => bcrypt('123456'), // password
        'status' => $faker->numberBetween(0, 1),
    ];
});
