<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SaleProduct;
use App\Models\Slide;
use Illuminate\Http\Request;



class UserHomeController extends Controller
{   
    public function index(){
        return view('user.pages.home',[
            'title' => 'Trang chủ - '.env('STORE_NAME','PenWeb'),
        ]);
    }
}
