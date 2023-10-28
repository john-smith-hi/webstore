<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'tel' => rand(0, 9999999999),
            'email' => Str::random(10).'@gmail.com',
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'address' => Str::random(30),
        ]);
        DB::table('users')->insert([
            'tel' => '0123456789',
            'email' => 'admin@gmail.com',
            'first_name' => 'Ad',
            'last_name' => 'min',
            'address' => Str::random(30),
            'role' => 1
        ]);
    }
}
