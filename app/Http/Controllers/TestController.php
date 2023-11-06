<?php

namespace App\Http\Controllers;

use App\Mail\ComfirmEmailMail;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\Category;

class TestController extends Controller
{
    public function index(){
        $product_image = ProductImage::first();
        $product = Product::find($product_image->product_id);
        $category = Category::find($product->category_id);
        $child_categories = Category::where('parent_id', $product->category_id)->get();
        foreach($child_categories as $child_category){
            $child_products = Product::where('category_id', $child_category->id)->get();
            foreach($child_products as $child_product){
                echo $child_product->id.' : '.$child_product->name.'<br>';
            }
        }
    }

}
