<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(AuthorsSeeder::class);
        $this->call(PublishersSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(BooksSeeder::class);
        $this->call(MembersSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TransactionsSeeder::class);
        $this->call(VisitorsSeeder::class);
    }
}
