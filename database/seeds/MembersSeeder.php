<?php

use App\Member;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;
        factory(Member::class, $count)->create();          
        Member::create(['no_induk' => '123456',  'name' => 'Sampel Anggota', 'kelas' => '', 'jurusan' => '', 'jenis_anggota' => 'guru/staff', 'address' => '', 'email' => 'member@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197034',  'name' => 'Ahmad Yusuf Pratama', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Ahmad_Yusuf_Pratama@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197035',  'name' => 'Ardi Trisepta', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Ardi_Trisepta@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197036',  'name' => 'Arief Fikri Dinnurizky', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Arief_Fikri_Dinnurizky@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197037',  'name' => 'Asniar Rahman', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Asniar_Rahman@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197038',  'name' => 'Dicky Aditia Wahyudi', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Dicky_Aditia_Wahyudi@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197039',  'name' => 'Fiqri Haikal', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Fiqri_Haikal@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197041',  'name' => 'Ikbal Wardana', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Ikbal_Wardana@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197042',  'name' => 'Maharani Ayu Hapsari', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Maharani_Ayu_Hapsari@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197043',  'name' => 'Maulana', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Maulana@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197044',  'name' => 'Muhammad Alvino Fikri', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Muhammad_Alvino_Fikri@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197045',  'name' => 'Muhammad Athoillah', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Muhammad_Athoillah@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197046',  'name' => 'Muhammad Haykal Bramantya', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Muhammad_Haykal_Bramantya@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197047',  'name' => 'Muhammad Ikhlas Sahrani', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Muhammad_Ikhlas_Sahrani@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197049',  'name' => 'Muhammad Rahmat', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Muhammad_Rahmat@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197050',  'name' => 'Muhammad Rizal', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Muhammad_Rizal@perpus.com', 'phone' => '', 'photo' => 'Fotoram_io_1_900ccbd410c56d6e27987466158af196_203.jpg']);
        // Member::create(['no_induk' => '197051',  'name' => 'Muhammad Rizky', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Muhammad_Rizky@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197052',  'name' => 'Nadia', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Nadia@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197053',  'name' => 'Nur Aminullah', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Nur_Aminullah@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197055',  'name' => 'Rizaldy Saputra', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Rizaldy_Saputra@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197056',  'name' => 'Rizky Lattuo', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Rizky_Lattuo@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197057',  'name' => 'Rusmilah Rakhmah', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Rusmilah_Rakhmah@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197058',  'name' => 'Sari Atu Putri', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Sari_Atu_Putri@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197059',  'name' => 'Syahrul Amrullah', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Syahrul_Amrullah@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197060',  'name' => 'Zhen Rayhan Mahrojan', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Zhen_Rayhan_Mahrojan@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197101',  'name' => 'Muhammad Nurdian Rachman', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Muhammad_Nurdian_Rachman@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197102',  'name' => 'Muhammad Rizky Alfhariazi', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Muhammad_Rizky_Alfhariazi@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197104',  'name' => 'Al-Farisi', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Al-Farisi@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '197105',  'name' => 'Akbar Wahyu Firdaus', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Akbar_Wahyu_Firdaus@perpus.com', 'phone' => '', 'photo' => '']);
        // Member::create(['no_induk' => '207220',  'name' => 'Muhammad Erwin Maulana', 'kelas' => '12', 'jurusan' => 'TKJ', 'jenis_anggota' => 'siswa/i', 'address' => '', 'email' => 'Muhammad_Erwin_Maulana@perpus.com', 'phone' => '', 'photo' => '']);

        $members =  Member::all();
        foreach ($members as $key => $member) {
            $random = Carbon::today()->subDays(rand(0, 90));
            $member->created_at = $random;
            $member->updated_at = $random;
            $member->save();
        }
    }
}
