<?php

use Faker\Generator as Faker;

$factory->define(App\Specialty::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
    ];
});
