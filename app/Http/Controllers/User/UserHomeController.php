<?php

namespace App\Http\Controllers\User;

use App\Helper\ProductHelper;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SaleProduct;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class UserHomeController extends Controller
{
    public function index(){
        // $siles = Slide::orderBy('id','desc')->get();
        // $lastestProducts = Product::orderBy('id','desc')->take(10)->get(); 
        // $brands = Brand::orderBy('id','desc')->take(10)->get(); 
        // return view('user.pages.home',[
        //     'slides' => $siles,
        //     'lastestProducts' => $lastestProducts,
        //     'ProductImage' => new ProductImage,
        //     'ProductHelper' => new ProductHelper(),
        //     'brands' => $brands,
        // ]);
        return view('user.pages.home');
    }
}
