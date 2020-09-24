<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Planner;
use Faker\Generator as Faker;
use Carbon\Carbon;
use App\User;

$factory->define(Planner::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'creator_id' => factory(User::class),
        'date' => Carbon::now(), // creating a planner for tomorrow
    ];
});
