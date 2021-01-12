<?php

use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {    
    $nama_depan = $faker->unique()->firstName;
    $nama_belakang = $faker->unique()->lastName;
    return [
        'nis' => $faker->unique()->randomNumber($nbDigits = 7),
        'name' => $nama_depan." ".$nama_belakang,
        'kelas' => ['10','11','12'][rand(0,2)],
        'jurusan' => ['RPL','TKJ', 'Multimedia'][rand(0,2)],
        'address' => $faker->address,
        'email' => $nama_depan."_".$nama_belakang."@gmail.com",
        'phone' => '08'.strval($faker->randomNumber(9))
    ];
});
