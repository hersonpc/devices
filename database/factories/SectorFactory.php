<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sector;
use Faker\Generator as Faker;

$factory->define(Sector::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'leader_name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
    ];
});
