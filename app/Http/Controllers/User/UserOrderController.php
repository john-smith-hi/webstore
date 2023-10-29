<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function index($id){
        $order = Order::where('id',$id)->where('user_id',Auth::user()->id)->first();
        $products = OrderProduct::join('products','order_products.product_id','=','products.id')
                                ->select('order_products.product_id','order_products.origin_price','order_products.final_price','order_products.quantity','products.name','products.slug')
                                ->where("order_id",$order->id);
        $products = $products->paginate(env('USER_PAGINATE_ORDER_NUMBER',5));
        return view("user.pages.order",[
            'total' => $order->total,
            'products' => $products,
            'pagename' => 'Chi tiết đơn hàng',
            'title' => 'Đơn hàng',
        ]);
    }

    public function delete(Request $request){
        try {
            $order = Order::where('user_id', Auth::user()->id)
                    ->where('id', $request->id)
                    ->first();
            if($order && ($order->status=='0' || $order->status== '1')){
                $order->status = 4;
                $order->update();
            }
            return redirect()->back()->with('success','Hủy đơn thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Hủy đơn thất bại');
        }
            
        
    }
}
