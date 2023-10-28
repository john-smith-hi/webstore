<?php
namespace App\Helper;
use App\Models\Product;
use App\Models\StorageHistory;
use Auth;
use Illuminate\Http\Request;

class StorageHelper{
    public static function SumInput($product_id = 0){
        return StorageHistory::where('status',0)
                            ->where('product_id', $product_id)
                            ->sum('quantity');
    }

    public static function SumOutput($product_id=0){
        return StorageHistory::where('status',1)
                            ->where('product_id', $product_id)
                            ->sum('quantity');
    }

    public static function Quantity($product_id=0){
        return StorageHelper::SumInput($product_id)-StorageHelper::SumOutput($product_id);
    }

}