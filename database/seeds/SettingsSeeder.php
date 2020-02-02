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
        $setting = Setting::create(['name' => 'Perpustakaan SMK Negeri 7 Samarinda', 'address' => 'Jl. Aminah Syukur No.82, Sungai Pinang Luar, Kec. Samarinda Kota, Kota Samarinda, Kalimantan Timur 75113', 'kepala_perpustakaan' => 'Khairul Anam, M.Pd','nip_kepala_perpustakaan' => '19670512 200701 1 038', 'pustakawan' => 'Ferdiana Tri Ulandari, S.Kom','nip_pustakawan' => '', 'about' => 'Aplikasi Perpustakaan SMKN7 Samarinda','logo' => '759c6ea44d6a4da8efc92f9d3f30f436.png','denda' => '2500', 'durasi' => '14', 'max_peminjaman' => '1']);
        $visitor = Visitor::create(['no_induk' => '1234567', 'name' => 'nur hakim','jenis_anggota' => 'siswa/i','kelas' => 'XII','keperluan' => 'minjam buku']);
        $carousel = Carousel::create(['title' => 'Buya Hamka', 'text' => '"Jangan takut jatuh, karena yang tidak pernah memanjatlah yang tidak pernah jatuh. Jangan takut gagal, karena yang tidak pernah gagal hanyalah orang-orang yang tidak pernah melangkah. Jangan takut salah, karena dengan kesalahan yang pertama kita dapat menambah pengetahuan untuk mencari jalan yang benar pada langkah yang kedua."','img' => '1.jpg']);
        $carousel1 = Carousel::create(['title' => 'Abdullah bin Mubarak', 'text' => '"Aku belajar adab (budi pekerti) selama tiga puluh tahun dan aku mempelajari ilmu selama dua puluh tahun. Orang-orang saleh terdahulu akan belajar adab terlebih dahulu, baru kemudian mencari ilmu."','img' => '2.jpg']);
        $carousel2 = Carousel::create(['title' => 'Albert Einstein', 'text' => '"Semua orang itu jenius. Tetapi jika Anda menilai ikan dengan kemampuannya untuk memanjat pohon, percayalah itu adalah bodoh."','img' => '3.jpg']);
        $announcement = Announcement::create(['text' => 'Kartu Anggota harus dibawa setiap kunjungan, pinjaman, pengembalian keperpustakaan.']);
        $announcement1 = Announcement::create(['text' => 'Tanpa kartu Aggota, kunjungan, pinjaman, pengembalian tidak dilayani.']);
        $announcement2 = Announcement::create(['text' => 'Pengembalian lewat dari Batas waktunya akan dikenakan denda.']);
        $announcement3 = Announcement::create(['text' => 'Kartu Anggota tidak dapat dipergunakan oleh orang lain.']);
        $announcement4 = Announcement::create(['text' => 'Kartu Anggota Berlaku hingga waktu yang ditentukan.']);
    }
}
