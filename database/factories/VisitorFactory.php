<?php

use Faker\Generator as Faker;

$factory->define(App\Visitor::class, function (Faker $faker) {    
    $jenis_anggota = ['siswa/i','guru/staff'][rand(0,1)];
    if($jenis_anggota == "siswa/i"){
        $kelas = ['X','XI','XII'][rand(0,2)];
    }else{
        $kelas = "";
    }
    return [
        'no_induk' => $faker->unique()->randomNumber($nbDigits = 7),
        'name' => $faker->firstName." ".$faker->lastName,
        'jenis_anggota' => $jenis_anggota,
        'kelas' => $kelas,
        'keperluan' => "Membaca Buku",
        'created_at' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = 'now', $timezone = 'Asia/Makassar'),
        'updated_at' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = 'now', $timezone = 'Asia/Makassar'),        
    ];
});
