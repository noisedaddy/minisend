<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'account_id' => null,
        'name' => $faker->company,
        'logo' => null,
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'website' => $faker->url,
        'facebook' => null,
        'twitter' => null,
        'linkedin' => null,
        'instagram' => null,
        'meta' => null,
    ];
});
