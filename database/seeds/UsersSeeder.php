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
        //buat role remember_token
        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "Member";
        $memberRole->save();
        //buat role Super Admin
        $superadminRole = new Role();
        $superadminRole->name = "superadmin";
        $superadminRole->display_name = "Super Admin";
        $superadminRole->save();
        //buat sample Admin
        $admin = new User();
        $admin->name = "Admin";
        $admin->username = "admin";
        $admin->email = "admin@admin.com";
        $admin->password = bcrypt('admin123');
        $admin->telp = "08218831299";
        $admin->alamat = "Jl Rapak Indah no 57";
        $admin->photo = "7efebd6c10c55554e906ebd783b1d73a.jpg";
        $admin->save();
        $admin->attachRole($adminRole);
        //buat sample Super Admin
        $superadmin = new User();
        $superadmin->name = "Kepala";
        $superadmin->username = "superadmin";
        $superadmin->email = "superadmin@superadmin.com";
        $superadmin->password = bcrypt('admin123');
        $superadmin->telp = "08218830000";
        $superadmin->alamat = "Jl Rapak Tak Indah no 07";
        $superadmin->photo = "sj76asgy3276h899hsh9ml5ia.jpg";
        $superadmin->save();
        $superadmin->attachRole($superadminRole);

        //buat sample member
        $member = new User();
        $member->name = "Sample Member";
        $member->username = "member";
        $member->email = "member@member.com";
        $member->password = bcrypt('admin123');
        $member->telp = "08218830000";
        $member->alamat = "Jl Rapak Tak Indah no 17";
        $member->photo = "";
        $member->member_id = "1";
        $member->save();
        $member->attachRole($memberRole);
        
    }
}
