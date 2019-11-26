<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {                
        Category::create(['name' => 'Architecture']);                
        Category::create(['name' => 'Language']);        
        Category::create(['name' => 'Biology']);
        Category::create(['name' => 'Economy']);                
        Category::create(['name' => 'Ethics']);        
        Category::create(['name' => 'Logical Philosophy']);
        Category::create(['name' => 'Philosophy and Psychology']);
        Category::create(['name' => 'Physics']);
        Category::create(['name' => 'Political science']);                                
        Category::create(['name' => 'Mathematics']);
        Category::create(['name' => 'Education']);                
        Category::create(['name' => 'History']);                      
        Category::create(['name' => 'Religion']);
        Category::create(['name' => 'Technology']);
        Category::create(['name' => 'No classification']);
        Category::create(['name' => 'General']);        
    }
}
