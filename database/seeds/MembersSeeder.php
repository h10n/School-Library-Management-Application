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
      
        $members =  Member::all();
        foreach ($members as $key => $member) {
            $random = Carbon::today()->subDays(rand(0, 90));
            $member->created_at = $random;
            $member->updated_at = $random;
            $member->save();
        }
    }
}
