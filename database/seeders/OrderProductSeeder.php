<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\SaleProduct;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_products')->insert([
            'order_id' => 1,
            'product_id' => Product::first()->id,
            'quantity' => 2,
            'price' => 100000,
            'sale_id' => SaleProduct::first()->id,
        ]);
        DB::table('order_products')->insert([
            'order_id' => 1,
            'product_id' => Product::first()->id,
            'quantity' => 10,
            'price' => 110000,
            'sale_id' => SaleProduct::first()->id,
        ]);
    }
}
