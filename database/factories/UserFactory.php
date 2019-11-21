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

    $role = rand(1, 4);
    $accountId = null;

    if ($role === 2 || $role === 3) {
        $accountId = rand(1,5);
    }

    return [
        'account_id' => $accountId,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'role' => $role,
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'position' => $faker->jobTitle,
        'password' => bcrypt('sample'), // password
        'remember_token' => Str::random(10),
    ];
});
