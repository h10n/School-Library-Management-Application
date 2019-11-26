<?php

use Illuminate\Database\Seeder;
use App\Setting;
use App\Visitor;
use App\Announcement;
use App\Carousel;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::create(['name' => 'SMKN7 Samarinda', 'address' => 'Jl santai', 'about' => 'Aplikasi Perpustakaan SMKN7 Samarinda','logo' => '33012bf9e662a4de463e317d3312dd1e.jpg','denda' => '2500', 'durasi' => '14', 'max_peminjaman' => '1']);
        $visitor = Visitor::create(['no_induk' => '1234567', 'name' => 'nur hakim','jenis_anggota' => 'siswa/i','kelas' => 'XII','keperluan' => 'minjam buku']);
        $carousel = Carousel::create(['title' => 'Chania', 'text' => 'The atmosphere in Chania has a touch of Florence and Venice.','img' => '1.jpg']);
        $carousel1 = Carousel::create(['title' => 'Flowers', 'text' => 'Beatiful flowers in Kolymbari, Crete.','img' => '2.jpg']);
        $carousel2 = Carousel::create(['title' => 'Carousel', 'text' => 'saya sudah mencari tutorial tentang pembuatan carousel menggunakan laravel, tapi gak ketemu jg kak.','img' => '3.jpg']);
        $announcement = Announcement::create(['text' => 'Selamat Datang Para Penuntut Ilmu']);
    }
}
