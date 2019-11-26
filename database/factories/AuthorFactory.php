<?php

use Faker\Generator as Faker;

$factory->define(App\Author::class, function (Faker $faker) {    
    $name = $faker->name;
    return [        
        'name' => $name,     
        'singkatan' => strtoupper(substr($name, 0, 3))   
    ];
});
