<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_comments')->insert([
            'user_id' => User::first()->id,
            'product_id' => Product::first()->id,
            'comment' => 'testcomment2',
        ]);
    }
}
