<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ad;
use App\User;
use Faker\Generator as Faker;

$factory->define(Ad::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->word,
        'creator_id' => factory(User::class),
        'start_date_time' => $faker->dateTime,
        'end_date_time' => $faker->dateTime,
        'address' => $faker->address,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'origin' => $faker->randomElement(['facebook', 'kijiji', 'app']),
    ];
});
