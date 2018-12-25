<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'photo_url' => $faker->imageUrl(640,480),
        'phone' => $faker->numerify('##########'),
        'qualification' => $faker->word,
        'faculty_id' => $faker->numberBetween(1,10),
        'course_id' => $faker->numberBetween(1,10),
        'aadhar' => $faker->numerify('############')
    ];
});
