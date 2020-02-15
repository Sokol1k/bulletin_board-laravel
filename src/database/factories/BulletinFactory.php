<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bulletin;
use Faker\Generator as Faker;

$factory->define(Bulletin::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' => $faker->text($maxNbChars = 100),
        'description' => $faker->text($maxNbChars = 500),
        'country' => $faker->country,
        'phone' => $faker->tollFreePhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'end_date' => $faker->dateTimeBetween('now', '+5 years'),
    ];
});
