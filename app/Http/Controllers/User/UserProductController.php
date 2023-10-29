<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class UserProductController extends Controller
{
    public function index($slug){
        $product = Product::join('categories as CAT1', 'products.category_id','CAT1.id')
                            ->leftJoin('categories as CAT2','CAT1.parent_id','CAT2.id')
                            ->select('products.*','CAT1.slug as child_slug','CAT2.slug as parent_slug')
                            ->where('products.slug',$slug)->where('status_sell',1)->first();
        $child_category_slug = $product->child_slug;
        $parent_category_slug = $product->parent_slug;
        $relativeProducts = Product::join('categories as CAT1', 'products.category_id','CAT1.id')
                                    ->leftJoin('categories as CAT2','CAT1.parent_id','CAT2.id')
                                ->select('products.*','CAT1.slug as child_slug','CAT2.slug as parent_slug')
                                ->where('products.id','<>',$product->id)
                                ->where('status_sell',1)
                                ->where(function($query) use ($child_category_slug, $parent_category_slug){
                                    $query->where('CAT1.slug','like','%'.$child_category_slug.'%')
                                        ->orWhere('CAT1.slug','like','%'.$parent_category_slug.'%')
                                        ->orWhere('CAT2.slug','like','%'.$child_category_slug.'%')
                                        ->orWhere('CAT2.slug','like','%'.$parent_category_slug.'%');
                                })
                                ->orderBy('products.id','desc')
                                ->paginate(env('USER_PAGINATE_RELATIVE_PRODUCT_NUMBER',10));
        return view('user.pages.productdetail',[
            'product' => $product,
            'relativeProducts' => $relativeProducts,
            'pagename' => 'Chi tiết sản phẩm',
        ]);
    }
}
