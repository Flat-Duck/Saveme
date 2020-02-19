<?php

use Faker\Generator as Faker;

$factory->define(App\Emergency::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'qualification' => $faker->name(),
        'clink_id' => function () {
            return factory(App\Clink::class)->create()->id;
        },
    ];
});
