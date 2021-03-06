<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'mobile_number' => $faker->phoneNumber(),
        'avarage' => $faker->numberBetween(70, 100),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('123456'), // password
        'remember_token' => Str::random(10),
        'specialize_id' => $faker->numberBetween(1, 10),
        'degree_id' => $faker->numberBetween(1, 10),
        'university_id' => $faker->numberBetween(1, 10),
    ];
});
