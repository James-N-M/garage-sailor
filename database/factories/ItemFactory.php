<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use App\Ad;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'ad_id' => factory(Ad::class),
    ];
});
