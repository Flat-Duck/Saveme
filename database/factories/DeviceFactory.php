<?php

use Faker\Generator as Faker;

$factory->define(App\Device::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'description' => $faker->paragraph(),
        'clink_id' => function () {
            return factory(App\Clink::class)->create()->id;
        },
    ];
});
