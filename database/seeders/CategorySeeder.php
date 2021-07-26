<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [ "name" => "men's clothing"],
            [ "name" => "jewelery"],
            [ "name" => "electronics"],
            [ "name" => "women's clothing"],
        ]);
    }
}





