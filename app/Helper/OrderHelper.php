<?php
namespace App\Helper;
use App\Models\Product;
use App\Models\StorageHistory;
use Auth;
use Illuminate\Http\Request;

class OrderHelper{
    public static function StatusName($status){
    //0:Chờ xử lý, 1:Đang giao hàng, 2:Đã giao hàng, 3:Hoàn thành, 4:Hủy
        switch ($status) {
            case '0':
                return 'Chờ xử lý';
            case '1':
                return 'Đang giao hàng';
            case '2':
                return 'Đã giao hàng';
            case '3':
                return 'Hoàn thành';
            case '4':
                return 'Hủy';
            default:
                return 'Không xác định';
        }
    }

    public static function PaymentStatusName($payment_status){
        switch ($payment_status) {
            case '0':
                return 'Chưa thanh toán';
            case '1':
                return 'Đã thanh toán';
            default:
                return 'Không xác định';
        }
    }
}