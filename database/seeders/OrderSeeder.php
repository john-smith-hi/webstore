<?php

namespace Database\Seeders;

use App\Models\User;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id' => User::first()->id,
            'total' => 2020000,
            'status' => 0,
            'shipping_address' => Str::random(20),
            'order_date' => '2023/09/27 08:23:50',
        ]);
    }
}
