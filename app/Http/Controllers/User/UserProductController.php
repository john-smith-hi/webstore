<?php

namespace App\Http\Controllers\User;

use App\Helper\ProductHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    public function index($slug){
        $product = Product::where('slug',$slug)->where('status_sell',1)->first();
        return view('user.pages.productdetail',[
            'product' => $product,
            'pagename' => 'Chi tiết sản phẩm',
        ]);
    }
}
