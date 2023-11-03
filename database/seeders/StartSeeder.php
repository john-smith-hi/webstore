<?php

namespace Database\Seeders;

use App\Helper\ProductHelper;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB :users
        //Admin
        // DB::table("users")->insert([
        //     'email' => 'leminhnhat1008199@gmail.com',
        //     'first_name' => 'Admin',
        //     'last_name' => 'Nhật',
        //     'role' => 1,
        // ]);
        // DB::table("users")->insert([
        //     'email' => 'leminhnhat10081999@gmail.com',
        //     'first_name' => 'Admin',
        //     'last_name' => 'Nhật 2',
        //     'role' => 1,
        // ]);
        // DB::table("users")->insert([
        //     'email' => 'titunnhat@gmail.com',
        //     'first_name' => 'Lương Thị Minh',
        //     'last_name' => 'Hoa',
        //     'role' => 1,
        // ]);
        // //Customer
        // DB::table("users")->insert([
        //     'email' => 'mike841651616@gmail.com',
        //     'first_name' => 'Nhân',
        //     'last_name' => 'viên',
        //     'role' => 2,
        // ]);
        // //User
        // DB::table("users")->insert([
        //     'email' => 'lmn147852369@gmail.com',
        //     'first_name' => 'Người dùng',
        //     'last_name' => Str::random(10),
        // ]);

        // for( $i = 0; $i < 100; $i++ ) {
        //     DB::table("users")->insert([
        //         'email' => Str::random(10).'@gmail.com',
        //         'first_name' => 'Người dùng',
        //         'last_name' => Str::random(10),
        //     ]);
        // }

        //Type : brands, categories, products, slides
        // products -> product_images, product_reviews, product_tags, sale_products
        // storage_histories -> carts -> orders -> order_products ->

        //DB : products
        // $categories = DB::table("categories")->get();
        // $brands = DB::table("brands")->get();
        // foreach ($categories as $category) {
        //     foreach ($brands as $brand) {
        //         for($i=0; $i<3; $i++){
        //             $name = $category->name.' '.$brand->name.($i+1);
        //             DB::table("products")->insert([
        //                 'name' => $name,
        //                 'slug'=> Str::slug($name),
        //                 'price' => random_int(2, 9999)*1000,
        //                 'summary' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste commodi, recusandae culpa assumenda quod voluptas minus facere distinctio. Eos ipsam ex omnis ea explicabo dolorem vero dolores voluptates saepe a!',
        //                 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste commodi, recusandae culpa assumenda quod voluptas minus facere distinctio. Eos ipsam ex omnis ea explicabo dolorem vero dolores voluptates saepe a!',
        //                 'information' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste commodi, recusandae culpa assumenda quod voluptas minus facere distinctio. Eos ipsam ex omnis ea explicabo dolorem vero dolores voluptates saepe a!',
        //                 'category_id' => $category->id,
        //                 'brand_id' => $brand->id,
        //                 'status_storage' => 1,
        //                 'status_sell' => 1,
        //             ]);
        //         }
        //     }
        // }

        // DB: product_reviews 
        // $products = DB::table('products')->get();
        // $first_user_id = User::orderBy('id','asc')->first()->id; 
        // $last_user_id = User::orderBy('id','desc')->first()->id; 
        // foreach ($products as $product) {
        //     $commentOfProduct = random_int(1, 100);
        //     for($i=0; $i<$commentOfProduct; $i++){
        //         DB::table('product_reviews')->insert([
        //             'product_id' => $product->id,
        //             'user_id' => random_int($first_user_id, $last_user_id),
        //             'rating' => random_int(1, 5),
        //             'comment' => Str::random(random_int(10, 30)),
        //         ]);
        //     }
        // }
        
        // DB : sale_products 
        // $first_product_id = Product::orderBy('id','asc')->first()->id;
        // $last_product_id = Product::orderBy('id','desc')->first()->id;
        // $countOfSale = 10000;
        // $startSaleDate = strtotime('2023-10-30');
        // $endStartSaleDate = strtotime('2023-12-31');
        
        // for($i=0; $i<$countOfSale; $i++){
        //     $dayOfSale = random_int(1, 100);
        //     $start_date = random_int($startSaleDate, $endStartSaleDate);
        //     $finish_date = $start_date+$dayOfSale*24*60*60;
        //     DB::table('sale_products')->insert([
        //         'product_id' => random_int($first_product_id, $last_product_id),
        //         'sale_price' => 0,
        //         'sale_percent' => random_int(1, 90),
        //         'start_date' => date('Y/m/d H:i:s', $start_date),
        //         'finish_date' => date('Y/m/d H:i:s', $finish_date),
        //         'status' => random_int(0, 1),
        //     ]);
        // }

        // DB : carts 
        // $first_user_id = User::orderBy('id','asc')->where('role',0)->first()->id;
        // $last_user_id = User::orderBy('id','desc')->where('role',0)->first()->id;
        // $first_product_id = Product::orderBy('id','asc')->first()->id;
        // $last_product_id = Product::orderBy('id','desc')->first()->id;
        // for($i=0; $i<1000; $i++){
        //     DB::table('carts')->insert([
        //         'user_id' => random_int($first_user_id, $last_user_id),
        //         'product_id' => random_int($first_product_id, $last_product_id),
        //         'quantity' => random_int(1, 20),
        //     ]);
        // }

        // DB : orders, order_products 
        // $first_user_id = User::orderBy('id','asc')->where('role',0)->first()->id;
        // $last_user_id = User::orderBy('id','desc')->where('role',0)->first()->id;
        // $first_product_id = Product::orderBy('id','asc')->first()->id;
        // $last_product_id = Product::orderBy('id','desc')->first()->id;
        // $countOfOrder = 500;
        // for($i=0; $i<$countOfOrder; $i++){
        //     $user = User::where('id', random_int($first_user_id, $last_user_id))->first();
        //     $status = random_int(0,4);
        //     $startOrderDate = strtotime('2023-10-01');
        //     $endStartOrderDate = strtotime('2023-12-31');
        //     $order_date = random_int($startOrderDate, $endStartOrderDate);
        //     $delivery_date = ($status>0) ? $order_date+random_int(1,30)*24*60*60 : '';
        //     $receive_date = ($status==2 || $status==3) ? $delivery_date+random_int(1,30)*24*60*60 : '';
        //     DB::table('orders')->insert([
        //         'user_id' => $user->id,
        //         'first_name' => $user->first_name,
        //         'last_name' => $user->last_name,
        //         'email' => $user->email,
        //         'tel' => (!empty($user->tel)) ? $user->tel : random_int(00000000, 99999999).'',
        //         'total' => 0,
        //         'status' => $status,
        //         'shipping_address' => (!empty($user->address)) ? $user->address : Str::random(random_int(0, 30)),
        //         'shipping_address2' => Str::random(random_int(0, 30)),
        //         'payment_method' => '',
        //         'status_payment' => 0,
        //         'order_date' => date('Y/m/d H:i:s', $order_date),
        //         'delivery_date' => ($status>0) ? date('Y/m/d H:i:s', $delivery_date) : null,
        //         'receive_date' => ($status==2 || $status==3) ? date('Y/m/d H:i:s', $receive_date) : null,
        //         'note' => (random_int(0,1)==1) ? 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores animi debitis voluptate culpa reprehenderit sint illum eos fugit, nostrum earum accusantium natus, eaque nemo sunt odio veniam dolor. Blanditiis, sed.' : '',
        //     ]);

        //     $order = Order::orderBy('id','desc')->first();
        //     $countOfProduct = random_int(1, 50);
        //     $total = 0;
        //     for($i=0; $i<$countOfProduct; $i++){
        //         $product = Product::find(random_int($first_product_id, $last_product_id));
        //         $originPrice = ProductHelper::OriginPrice($product->id);
        //         $isSaling = ProductHelper::IsSaling($product->id);
        //         if($isSaling)
        //             $realPrice = ProductHelper::RealPrice($product->id);
        //         $quantity = random_int(1,50);
        //         $total += ($isSaling) ? $realPrice*$quantity : $originPrice*$quantity;

        //         DB::table('order_products')->insert([
        //             'order_id' => $order->id,
        //             'product_id' => $product->id,
        //             'origin_price' => $originPrice,
        //             'sale_id' => ($isSaling) ? $isSaling : null,
        //             'final_price' => ($isSaling) ? $realPrice : $originPrice,
        //             'quantity' => $quantity,
        //         ]);
        //     }

        //     $order = Order::orderBy('id','desc')->first();
        //     $total = number_format($total,0,'','');
        //     $order->total = $total;
        //     $order->update();
        // }

        // DB : product_images 
        $product_images = ProductImage::get();
        foreach ($product_images as $key => $product_image) {
            $product_id = $product_image->id;
            $products = DB::table('products as PRO1')
                            ->join('categories as CAT1','products.category_id','CAT1.id')
                            ->leftJoin('categories as CAT2', 'CAT1.parent_id','CAT2.id')
                            ->select('PRO1.id','CAT1.id as child_id','CAT2 as parent_id')
                            ->where('PRO1.id', $product_image->product_id);
        }
    }
}
