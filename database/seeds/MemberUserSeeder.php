<?php

use App\Member;
use App\User;
use Illuminate\Database\Seeder;
use App\Role;

class MemberUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $members = Member::all();
        $role = Role::where('name', '=', 'member')->first();
        foreach ($members as $key => $member) {
            if (!$member->user) {
                $user = User::create(['username' => $member->no_induk, 'name' => $member->name, 'password' => bcrypt($member->no_induk), 'member_id' => $member->id, 'photo' => '']);
                if ($user) {
                    $user->attachRole($role);
                }
            }
        }
    }
}
