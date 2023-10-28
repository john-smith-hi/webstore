<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserReviewSubmitRequest;
use App\Models\ProductReview;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReviewController extends Controller
{
    public function submit(UserReviewSubmitRequest $request){
        $product_id = $request->product_id;
        $rating = $request->rating;
        $comment = $request->comment;
        try {
            $review = new ProductReview();
            $review->product_id = $product_id;
            $review->user_id = Auth::user()->id;
            $review->rating = $rating;
            $review->comment = $comment;
            $review->saveOrFail();        
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Đánh giá thất bại');
        }
        
    }
}
