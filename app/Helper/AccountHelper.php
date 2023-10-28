<?php
namespace App\Helper;
use Auth;
use Illuminate\Http\Request;

class AccountHelper{
    public static function RoleName($role){
        switch ($role) {
            case '0':{
                return 'Khách hàng';
            }
            case '1':{
                return 'Quản trị viên';
            }
            case '2':{
                return 'Nhân viên';
            } 
            
            default:{
                return 'Chưa xác định';
            }
        }
    }
    
}