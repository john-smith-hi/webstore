<?php
namespace App\Helper;
use Auth;
use Illuminate\Http\Request;

class DateHelper{
    public static function ChangeTodmY($date){
        return date('d/m/Y H:i:s',strtotime($date));
    }
    public static function ChangeTodmY2($date){
        return date('d/m/Y',strtotime($date));
    }
}