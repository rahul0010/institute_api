<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'description' => $faker->text(200),
        'duration' => $faker->numberBetween(2,5),
        'image_url' => $faker->imageUrl(640,480),
        'total_fee' => $faker->numberBetween(2,10) * 1000,
        'syllabus_link' => $faker->imageUrl(640,480),
    ];
});
