<?php

use App\Publisher;
use Illuminate\Database\Seeder;

class PublishersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Publisher::class, 10)->create();    
    }
}
