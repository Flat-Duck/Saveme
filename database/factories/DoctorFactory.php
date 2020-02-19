<?php

use Faker\Generator as Faker;

$factory->define(App\Doctor::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'phone' => $faker->phoneNumber(),
        'qualification' => $faker->name(),
        'clink_id' => function () {
            return factory(App\Clink::class)->create()->id;
        },
        'specialty_id' => function () {
            return factory(App\Specialty::class)->create()->id;
        },
    ];
});
