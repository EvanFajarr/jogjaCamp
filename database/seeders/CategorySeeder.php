<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'name'=>'tutorial',
        ]);

        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 100; $i++){
 
    	    
    		DB::table('category')->insert([
    			'name' => $faker->name,
    		]);
 
    	}
    }
}
