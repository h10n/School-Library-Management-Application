<?php

use App\Visitor;
use Illuminate\Database\Seeder;

class VisitorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;
        factory(Visitor::class, $count)->create();   
    }
}
