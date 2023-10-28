<?php

namespace App\Http\Controllers\Admin;

use App\Helper\DateHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\User;
use Illuminate\Http\Request;

class AdminRatingController extends Controller
{
    public function index(Request $request){
        $search_product_name = trim($request->search_product_name);
        $product_id = $request->product_id;
        $ratings = ProductRating::join('products','product_ratings.product_id','=','products.id')->select('product_ratings.id', 'product_ratings.product_id','product_ratings.user_id','product_ratings.rating','product_ratings.created_at');
        if(!empty($product_id))
        {   
            $ratings = $ratings->where('product_ratings.product_id',$product_id);
        }
        $ratings = $ratings->orderBy('id','desc')->paginate(env('ADMIN_PAGINATE_NUMBER',5));
        return view('admin.pages.rating.index',[
            'DateHelper' => new DateHelper(),
            'ratings' => $ratings,
            'User' => new User(),
            'Product' => new Product(),
            'search_product_name' => $search_product_name,
            'product_id' => $product_id,
        ]);
    }

    public function edit($id, Request $request){
        try {
            $rating = ProductRating::find($id);
            if(empty($request->rating))
                return redirect()->route('admin.rating.index')->with('error','Cập nhật thiếu đánh giá');
            if(!is_numeric($request->rating) || $request->rating < 1 || $request->rating > 5)
                return redirect()->route('admin.rating.index')->with('error','Đánh giá phải là số từ 1 đến 5');   
            $rating->rating = $request->rating;
            $rating->save();
            return redirect()->route('admin.rating.index')->with('success','Lưu thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.rating.index')->with('error','Lưu thất bại');
        }
        
    }

    public function delete($id){
        try {
            $rating = ProductRating::find($id);
            $rating->delete();
            return redirect()->route('admin.rating.index')->with('success','Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.rating.index')->with('error','Xóa thất bại');
        }
        
    }
}
