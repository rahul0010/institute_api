<?php

use Faker\Generator as Faker;

$factory->define(App\Fee::class, function (Faker $faker) {
    return [
        'student_id' => $faker->numberBetween(1,100),
        'course_id' => $faker->numberBetween(1,10),
        'installment_no' => $faker->numberBetween(1,5),
        'total_fees' => $faker->numberBetween(5,50) * 1000,
        'fees_paid' => $faker->numberBetween(5,50) * 1000,
        'payment_due' => $faker->date('Y-m-d'),
        'amount' => $faker->numberBetween(2,10) * 1000,
        'payment_date' => $faker->date(),
        'total_fee_paid' => $faker->numberBetween(5,50) * 1000,
        'balance' => $faker->numberBetween(5,50) * 1000
    ];
});
