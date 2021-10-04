<?php

use Faker\Generator as Faker;

$factory->define(App\BorrowLog::class, function (Faker $faker) {    
    return [
        // 'transaction_code' => $faker->unique()->randomNumber($nbDigits = 7),
        'book_id' => $faker->unique()->numberBetween($min = 1, $max = 85),
        'member_id' => $faker->unique()->numberBetween($min = 1, $max = 100),
        'user_id' => '1',
        'is_returned' => $faker->boolean,
        'created_at' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', $timezone = 'Asia/Makassar'),
        'updated_at' => $faker->dateTimeBetween($startDate = 'tomorrow', $endDate = '+30 days', $timezone = 'Asia/Makassar'),
    ];
});
