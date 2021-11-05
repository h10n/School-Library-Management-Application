<?php

use App\BorrowLog;
use Illuminate\Database\Seeder;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 20;
        factory(BorrowLog::class, $count)->create();       
    }
}
