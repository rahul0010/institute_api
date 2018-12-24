<?php

use Faker\Generator as Faker;

$factory->define(App\Batch::class, function (Faker $faker) {
    return [
        'start_time' => $faker->time('H:i:s'),
        'end_time' => $faker->time('H:i:s')
    ];
});
