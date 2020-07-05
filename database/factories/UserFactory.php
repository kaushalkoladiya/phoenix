<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use App\User;
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

    $role_id = random_int(2, 3);

    return [
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'role_id' => $role_id,
        'password' => '$2y$10$R9V2LUblXkSbXKPREQGs7etE7elESIA8/j9P0F8ZhDT2wnUPXwuYW', // password 12345678
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Subscribe::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
    ];
});

$factory->define(Feedback::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'description' => $faker->text
    ];
});
