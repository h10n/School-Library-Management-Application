<?php

use Illuminate\Database\Seeder;
use App\Book;
use App\Author;
use App\Member;
use App\User;
use App\Publisher;
use App\Category;
use App\BorrowLog;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        //sample category
        $category1 = Category::create(['name' => 'undang-undang']);
        $category2 = Category::create(['name' => 'novel']);
        $category3 = Category::create(['name' => 'komik']);
        //sample buku
        $book1 = Book::create(['title' => '20 Jalan Kebaikan', 'amount' =>4,'cover' => '7c7086abe1de5f5b45e16601600734cf.jpg', 'author_id' => '1', 'publisher_id' => '1','category_id' => $category2->id, 'published_location' => 'Samarinda','classification_code' => '0912','initial' => 'J', 'source' => 'S' ,'no_induk' => '4123/SMKN7/S.2018', 'published_year' => '2005', 'book_year' => '2006']);
        $book2 = Book::create(['title' => 'Dari Langit Ke Bumi', 'amount' =>1,'cover' => 'b115307db89fe9c98b5508f83067fa23.jpg', 'author_id' => '2', 'publisher_id' => '2','category_id' => $category2->id, 'published_location' => 'Samarinda', 'classification_code' => '0912','initial' => 'J', 'source' => 'S' ,'no_induk' => '4124/SMKN7/S.2018', 'published_year' => '2005', 'book_year' => '2006']);
        $book3 = Book::create(['title' => 'Perubahan Perjuangan', 'amount' =>2,'cover' => 'b0e1ed681c63743819a2ff9a704b6cb3.jpg', 'author_id' => '3', 'publisher_id' => '3','category_id' => $category3->id, 'published_location' => 'Samarinda', 'classification_code' => '0912','initial' => 'J', 'source' => 'P' ,'no_induk' => '4125/SMKN7/S.2018', 'published_year' => '2005', 'book_year' => '2006']);
        $book4 = Book::create(['title' => '7 hari Pro', 'amount' =>4,'cover' => '', 'author_id' => '4', 'publisher_id' => '4','category_id' => $category1->id, 'published_location' => 'Samarinda','classification_code' => '091,2', 'initial' => 'J','source' => 'P' ,'no_induk' => '4126/SMKN7/S.2018', 'published_year' => '2005', 'book_year' => '2006']);
        //sample pinjam Buku
        $member1 = Member::create(['nis' => '154305411','name' => 'Sasuke','kelas' => '10','jurusan' =>'RPL 2','address' => 'Jl Santai Rt 01 no 41','email' => 'imuchihalast@gmail.com', 'phone' => '08213777121', 'photo' => '']);
        $member2 = Member::create(['nis' => '154302211','name' => 'Gara','kelas' => '11','jurusan' =>'MM 1','address' => 'Jl Anggur no 39','email' => 'gaarathesand@gmail.com', 'phone' => '083661221', 'photo' => '']);
        $member3 = Member::create(['nis' => '154303511','name' => 'Naruto','kelas' => '12','jurusan' =>'TKJ 3','address' => 'Jl Pemuda 03 Blok B no 62','email' => 'little_naruto@gmail.com', 'phone' => '0915648853', 'photo' => '']);

        $member = User::where('email','admin@admin.com')->first();
        BorrowLog::create(['transaction_code' => 'TR0001','member_id' => $member1->id,'user_id' => $member->id, 'book_id' => $book1->id,'is_returned' => 0]);
        BorrowLog::create(['transaction_code' => 'TR0002','member_id' => $member2->id,'user_id' => $member->id, 'book_id' => $book2->id,'is_returned' => 0]);
        BorrowLog::create(['transaction_code' => 'TR0003','member_id' => $member3->id,'user_id' => $member->id, 'book_id' => $book3->id,'is_returned' => 1]);
    }
}
