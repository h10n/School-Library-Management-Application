<?php

use Faker\Generator as Faker;

$factory->define(App\BorrowLog::class, function (Faker $faker) {
    $returned = $faker->boolean;
    return [
        // 'transaction_code' => $faker->unique()->randomNumber($nbDigits = 7),
        'book_id' => $faker->unique()->numberBetween($min = 1, $max = 85),
        'member_id' => $faker->unique()->numberBetween($min = 1, $max = 30),
        'user_id' => '1',
        'user_returned_id' =>  $returned ? ['1', '2'][rand(0, 1)] : null,
        'is_returned' => $returned,
        'created_at' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', $timezone = 'Asia/Makassar'),
        'updated_at' => $faker->dateTimeBetween($startDate = 'tomorrow', $endDate = '+30 days', $timezone = 'Asia/Makassar'),
    ];
});
