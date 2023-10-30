<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index(Request $request){
        $search_product_name = $request->search_product_name;
        $product_id = $request->product_id;
        $reviews = ProductReview::orderBy('id','desc')->paginate(env('ADMIN_PAGINATE_NUMBER',5));
        return view('admin.pages.review.index',[
            'search_product_name'=> $search_product_name,
            'product_id' => $product_id,
            'reviews' => $reviews,
        ]);
    }

    public function update($id){
        
    }
}
