<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'isAdmin' => true,
            ],
            [
                'name' => 'user1',
                'email' => 'user@gmail.com',
                'password' => Hash::make('12345678'),
                'isAdmin' => false,
            ]
        ]);
    }
}
