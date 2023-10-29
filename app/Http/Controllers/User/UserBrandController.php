<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class UserBrandController extends Controller
{
    public function index(){
        return view("user.pages.brand",[
            "pagename"=> "Thương hiệu",
            'title' => 'Thương hiệu - '.env('STORE_NAME','PenWeb'),
        ]);
    }

    public function detail($slug){
        $brand = Brand::where("slug",$slug)->first();
        if($brand){
            $products = Product::join('brands','products.brand_id','=','brands.id')
                            ->select('products.*','brands.slug')
                            ->where('brands.slug','=', $brand->slug)->paginate(env('USER_SEARCH_RESULT_PRODUCT',10));
            $pagename = $brand->name;
            return view("user.pages.branddetail",[
                'brand' => $brand,
                'products'=> $products,
                "pagename"=> $pagename,
                'title' => 'Thương hiệu '.$brand->name.' - '.env('STORE_NAME','PenWeb'),
            ]);
        }
    }
}
