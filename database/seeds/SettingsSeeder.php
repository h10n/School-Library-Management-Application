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
        $setting = Setting::create([
            'name' => 'Your School',
            'address' => 'Your School Address No 01 Phone 08000000022 Samarinda Postal Code. 75011',
            'website' => 'www.yourschoolwebsite.sch.id',
            'email' => 'yourschoolemail@yourschoolwebsite.com',
            'pengelola' => 'Samarinda City Primary and Secondary Education Council',
            'kepala_perpustakaan' => 'Hakim Nur, S.E',
            'nip_kepala_perpustakaan' => '',
            'about' => 'School Library Management Application',
            'logo' => 'Your_School_logos_black_8ddc73252c67e62307b5fba8ed6ef027_715.png',
            'denda' => '2000',
            'durasi' => '7',
            'max_peminjaman' => '1'
        ]);
        $carousel = Carousel::create([
            'title' => 'Buya Hamka',
            'text' => '"Do not be afraid to fall, because it is those who never climb who never fall. Do not be afraid to fail, because the only people who never fail are those who never step up. Do not be afraid to be wrong, because with the first mistake we can add knowledge to find the right path in the second step."',
            'img' => '1.jpg'
        ]);
        $carousel1 = Carousel::create([
            'title' => 'Abdullah bin Mubarak',
            'text' => '"I spent thirty years learning manners, and I spent twenty years learning knowledge."',
            'img' => '2.jpg'
        ]);
        $carousel2 = Carousel::create([
            'title' => 'Albert Einstein',
            'text' => '"Everybody is a genius. But if you judge a fish by its ability to climb a tree, it will live its whole life believing that it is stupid."',
            'img' => '3.jpg'
        ]);
        $announcement = Announcement::create([
            'text' => 'Membership card must be brought when visiting, borrowing, returning to the library.'
        ]);
        $announcement1 = Announcement::create([
            'text' => 'Without a Member card, visits, loans, returns are not served.'
        ]);
        $announcement2 = Announcement::create([
            'text' => 'Returns after the deadline will be subject to a fine.'
        ]);
        $announcement3 = Announcement::create([
            'text' => 'Membership Card cannot be used by other people.'
        ]);
        $announcement4 = Announcement::create([
            'text' => 'Member Card Valid until the specified time.'
        ]);
    }
}
