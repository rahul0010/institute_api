<?php

use Faker\Generator as Faker;

$factory->define(App\Faculty::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'photo_url' => $faker->imageUrl(640,480),
        'phone' => $faker->numerify('##########'),
        'designation' => $faker->jobTitle,
        'qualification' => $faker->word,
        'aadhar' => $faker->numerify('############')
    ];
});
