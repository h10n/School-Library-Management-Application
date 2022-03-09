<?php

use Illuminate\Database\Seeder;
use App\Book;
use App\Author;
use App\Member;
use App\User;
use App\Publisher;
use App\Category;
use App\BorrowLog;
use Carbon\Carbon;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create(['no_induk' => '4062', 'title' => 'End Of The Curse', 'author_id' => '1', 'publisher_id' => '1', 'published_location' => 'Yogyakarta', 'published_year' => '2008', 'book_year' => '2008', 'classification_code' => '910001', 'initial' => 'K', 'amount' => '1', 'category_id' => '1', 'cover' => '', 'source' => '']);
        Book::create(['no_induk' => '4063', 'title' => 'Invaders And Humans', 'author_id' => '2', 'publisher_id' => '2', 'published_location' => 'Yogyakarta', 'published_year' => '2008', 'book_year' => '2008', 'classification_code' => '910002', 'initial' => 'K', 'amount' => '1', 'category_id' => '2', 'cover' => '', 'source' => '']);
        Book::create(['no_induk' => '4064', 'title' => 'Name Of The Forest', 'author_id' => '3', 'publisher_id' => '3', 'published_location' => 'Jakarta', 'published_year' => '2009', 'book_year' => '2009', 'classification_code' => '910003', 'initial' => 'M', 'amount' => '1', 'category_id' => '3', 'cover' => '', 'source' => '']);
        Book::create(['no_induk' => '4065', 'title' => 'Deceiving The Jungle', 'author_id' => '4', 'publisher_id' => '4', 'published_location' => 'Jakarta', 'published_year' => '1969', 'book_year' => '1969', 'classification_code' => '910004', 'initial' => 'M', 'amount' => '3', 'category_id' => '4', 'cover' => '', 'source' => '']);
        Book::create(['no_induk' => '4068', 'title' => 'Mercenary Of The Future', 'author_id' => '5', 'publisher_id' => '5', 'published_location' => '', 'published_year' => '2002', 'book_year' => '2002', 'classification_code' => '910005', 'initial' => 'S', 'amount' => '1', 'category_id' => '5', 'cover' => '', 'source' => '']);
        Book::create(['no_induk' => '4069', 'title' => 'Leaders Of The New World', 'author_id' => '6', 'publisher_id' => '6', 'published_location' => 'Jakarta', 'published_year' => '2006', 'book_year' => '2006', 'classification_code' => '910006', 'initial' => 'S', 'amount' => '2', 'category_id' => '6', 'cover' => '', 'source' => '']);
        Book::create(['no_induk' => '4071', 'title' => 'Destruction Of The New World', 'author_id' => '7', 'publisher_id' => '7', 'published_location' => 'Jakarta', 'published_year' => '2006', 'book_year' => '2006', 'classification_code' => '910007', 'initial' => 'S', 'amount' => '2', 'category_id' => '7', 'cover' => '', 'source' => '']);
        Book::create(['no_induk' => '4073', 'title' => 'Moons Of Your Dreams', 'author_id' => '8', 'publisher_id' => '8', 'published_location' => 'Jakarta', 'published_year' => '2006', 'book_year' => '2006', 'classification_code' => '910008', 'initial' => 'S', 'amount' => '5', 'category_id' => '8', 'cover' => '', 'source' => '']);
        Book::create(['no_induk' => '4078', 'title' => 'Digitize Science', 'author_id' => '9', 'publisher_id' => '9', 'published_location' => 'Klaten', 'published_year' => '2003', 'book_year' => '2003', 'classification_code' => '910009', 'initial' => 'S', 'amount' => '1', 'category_id' => '9', 'cover' => '', 'source' => '']);
        Book::create(['no_induk' => '4079', 'title' => 'Goats And Tigers', 'author_id' => '10', 'publisher_id' => '10', 'published_location' => 'Jakarta', 'published_year' => '2004', 'book_year' => '2004', 'classification_code' => '910010', 'initial' => 'S', 'amount' => '1', 'category_id' => '10', 'cover' => '', 'source' => '']);
        
        $books =  Book::all();
        foreach ($books as $key => $book) {
            $random = Carbon::today()->subDays(rand(0, 90));
            $book->created_at = $random;
            $book->updated_at = $random;
            $book->save();
        }
    }
}
