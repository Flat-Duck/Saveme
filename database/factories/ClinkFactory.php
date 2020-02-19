<?php

use Faker\Generator as Faker;

$factory->define(App\Clink::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'phone_number' => $faker->phoneNumber(),
        'latitude' => $faker->randomFloat(2, 0, 99),
        'longitude' => $faker->randomFloat(2, 0, 99),
        'status' => $faker->boolean(),
        'visible' => $faker->boolean(),
        'address' => $faker->address(),
        'price' => $faker->randomFloat(2, 0, 99),
    ];
});
