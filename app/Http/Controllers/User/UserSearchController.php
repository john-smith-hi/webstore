<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    public function index(Request $request){
        $price = $request->input('price');
        $categories = $request->input('category');
        $brands = $request->input('brand');
        $name = $request->input('name');
        $products = Product::leftJoin('categories as CAT1','products.category_id','CAT1.id')
                            ->leftJoin('categories as CAT2','CAT1.parent_id','CAT2.id')
                            ->leftJoin('brands','products.brand_id','brands.id')
                            ->select('products.*','CAT1.slug','CAT2.slug','brands.slug');
        if(!empty($name))
            $products = $products->where('products.name','like','%'.$name.'%');
        if(!empty($categories)){
            $products = $products->where(function($query) use ($categories){
                $query->where('CAT1.slug',$categories[0])
                        ->orWhere('CAT2.slug',$categories[0]);
                foreach($categories as $key => $category){
                    if($key==0) continue;
                    $query->orWhere('CAT1.slug',$category);
                    $query->orWhere('CAT2.slug',$category);
                }
            });
        }
        if(!empty($brands)){
            $products = $products->where(function($query) use ($brands){
                $query->where('brands.slug',$brands[0]);
                foreach($brands as $key => $brand){
                    if($key==0) continue;
                    $query->orWhere('brands.slug',$brand);
                }
            });
        }
        $products = $products->where('products.status_sell',1)->paginate(env('USER_PAGINATE_SEARCH_PRODUCT_NUMBER',10));
        return view('user.pages.search',[
            'price' => $price,
            'categories_search' => $categories,
            'brands_search' => $brands,
            'name_search' => $name,
            'products' => $products,
            'pagename' => 'Tìm kiếm',
            'title' => 'Tìm kiếm - '.env('STORE_NAME','PenWeb'),
        ]);
    }
}
