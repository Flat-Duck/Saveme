<?php

use Faker\Generator as Faker;

$factory->define(App\Appointment::class, function (Faker $faker) {
    return [
        'start_time' => $faker->time(),
        'finish_time' => $faker->time(),
        'clink_id' => function () {
            return factory(App\Clink::class)->create()->id;
        },
        'doctor_id' => function () {
            return factory(App\Doctor::class)->create()->id;
        },
    ];
});
