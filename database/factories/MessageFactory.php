<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'from_id' => factory(User::class)->create(),
        'to_id' => factory(User::class)->create(),
        'text' => $faker->sentence,
    ];
});
