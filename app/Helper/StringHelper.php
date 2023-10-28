<?php
namespace App\Helper;
use App\Models\Product;
use App\Models\StorageHistory;
use Auth;
use Illuminate\Http\Request;

class StringHelper{
    public static function DeleteFinalChars($str='',$getCharsNumber=30){
        $arrStr = explode(' ', $str);
        $result = '';
        if(count($arrStr) <= $getCharsNumber) return $str;
        for($i=0; $i<$getCharsNumber; $i++){
            $result .= $arrStr[$i].' ';
        }
        return $result.'...';
    }
}