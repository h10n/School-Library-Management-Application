<?php

use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {    
    $nama_depan = $faker->unique()->firstName;
    $nama_belakang = $faker->unique()->lastName;
    $jenis_anggota = ['siswa/i','guru/staff'][rand(0,1)];
    if($jenis_anggota == "siswa/i"){
        $kelas = ['10','11','12'][rand(0,2)];
        $jurusan = ['RPL','TKJ', 'Multimedia'][rand(0,2)];
    }else{
        $kelas = "";
        $jurusan = "";
    }
    return [
        'no_induk' => $faker->unique()->randomNumber($nbDigits = 7),
        'name' => $nama_depan." ".$nama_belakang,
        'jenis_anggota' => $jenis_anggota,
        'kelas' => $kelas,
        'jurusan' => $jurusan,
        'address' => $faker->address,
        'email' => $nama_depan."_".$nama_belakang."@gmail.com",
        'phone' => '08'.strval($faker->randomNumber(9))
    ];
});
