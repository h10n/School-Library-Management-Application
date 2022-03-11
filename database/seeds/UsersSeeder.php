<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //buat role admin
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();
        //buat role member
        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "Member";
        $memberRole->save();
        //buat role pegawai
        $staffRole = new Role();
        $staffRole->name = "staff";
        $staffRole->display_name = "staff";
        $staffRole->save();
        //buat role pengunjung
        $visitorRole = new Role();
        $visitorRole->name = 'visitor';
        $visitorRole->display_name = 'visitor';
        $visitorRole->save();

        //buat sample Admin
        $admin = new User();
        $admin->name = "Nur Hakim";
        $admin->username = "admin";        
        $admin->password = bcrypt('admin123');
        $admin->photo = "JPG_1570025308579_2_6b4f03596ca77295b27b916715fbd3ef_578.jpg";
        $admin->save();
        $admin->attachRole($adminRole);
        
        //buat sample Super Admin
        $staff = new User();
        $staff->name = "M. Afif Masrur";
        $staff->username = "staff";        
        $staff->password = bcrypt('admin123');        
        $staff->photo = "";
        $staff->save();
        $staff->attachRole($staffRole);

        //buat sample member
        $member = new User();
        $member->name = "Member Sample";
        $member->username = "member";        
        $member->password = bcrypt('admin123');
        $member->photo = "";
        $member->member_id = "1";
        $member->save();
        $member->attachRole($memberRole);

        //buat sample pengunjung
        $visitor = new User();
        $visitor->name = "Visitor";
        $visitor->username = "visitor";        
        $visitor->password = bcrypt('admin123');
        $visitor->photo = "";
        $visitor->save();
        $visitor->attachRole($visitorRole);
    }
}
