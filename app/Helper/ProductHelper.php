<?php
namespace App\Helper;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductReview;
use App\Models\SaleProduct;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductHelper{
    public static function OriginPrice($product_id='0'){
        $product = Product::find($product_id);
        if(!empty($product))
            return $product->price;
        return 0;
    }

    public static function Slug($product_id='0'){
        $product = Product::find($product_id);
        if(!empty($product))
            return $product->slug;
        return '';
    }

    public static function IsSaling($product_id='0'){
        $now = Carbon::now();
        $sale = SaleProduct::where('product_id',$product_id)
                            ->where('start_date','<=',$now)
                            ->where('finish_date','>=',$now)
                            ->orderBy('id','desc')
                            ->where('status',1);
        if($sale->count()==0) return false;
        return $sale->first()->id;
    }

    public static function RealPrice($product_id='0'){
        $product = Product::find($product_id);
        $price = $product->price;
        $now = Carbon::now();
        $sale = SaleProduct::where('product_id',$product_id)
                            ->where('start_date','<=',$now)
                            ->where('finish_date','>=',$now)
                            ->where('status',1)
                            ->orderBy('id','desc');
        if($sale->count()>0){
            $sale = $sale->first();
            if(!($sale->sale_price==0)){
                $price -= $sale->sale_price;
            }
            if(!($sale->sale_percent==0)){
                $price = $price*(1-$sale->sale_percent/100);
            }
        }
        return $price;
    }

    public static function FirstImage($product_id='0'){
        $image = ProductImage::where('product_id',$product_id)->first();
        if(!empty($image))
            return $image->image;
        return ProductImage::inRandomOrder()->first()->image;
    }

    public static function AllImage($product_id= "0"){
        $images = ProductImage::where("product_id",$product_id)->get();
        if(!empty($images))
            return $images;
        return "";
    }

    public static function Rating( $product_id= "0"){
        $ratings = ProductReview::where("product_id",$product_id);
        $count = $ratings->count();
        if($count==0) 
            return ['count' => 0, 'rating' => 0];
        $ratings = $ratings->get();
        $sum = 0;
        foreach($ratings as $rating){
            $sum += $rating->rating;
        }
        return ['count'=> $count,'rating'=> round($sum/$count,1)];
    }

}