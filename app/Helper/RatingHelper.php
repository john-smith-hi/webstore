<?php
namespace App\Helper;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductReview;
use App\Models\SaleProduct;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RatingHelper{
    public static function printt($rating=1){
        $rating_round = number_format($rating,0);
        $str = '<div class="text-primary mr-2">';
        for( $i = 0; $i < $rating_round; $i++ ){
            $str .= '<span class="fas fa-star"></span>';
        }
        if($rating == $rating_round){
            for($i=0; $i<(5-$rating_round); $i++)
            $str .= '<span class="far fa-star"></span>';
        }
        else{
            $str .= '<span class="fas fa-star-half-alt"></span>';
            for($i=0; $i<(5-$rating_round-1); $i++)
            $str .= '<span class="far fa-star"></span>';
        }   
            
        $str .= '</div>';

        return $str;
    }
}