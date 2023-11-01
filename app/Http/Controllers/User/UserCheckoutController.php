<?php

namespace App\Http\Controllers\User;


use App\Helper\ProductHelper;
use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class UserCheckoutController extends Controller
{
    public function index(Request $request){
        $product_id_arr = $request->input('product_id');
        $quantity_arr = $request->input('quantity');
        if(!empty($product_id_arr) && !empty($quantity_arr)){
            return view('user.pages.checkout',[
                'pagename' => 'Thanh toán',
                'product_id_arr' => $product_id_arr,
                'quantity_arr' => $quantity_arr,
            ]);
        }
        return view('user.pages.checkout',[
            'pagename' => 'Thanh toán',
            'title' => 'Thanh toán',
        ]);
    }

    public function submit(Request $request){
        $payment_method = $request->input('payment_method');
        if(!empty($payment_method)){
            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $email = $request->input('email');
            $tel = $request->input('tel');
            $shipping_address = $request->input('shipping_address');
            $shipping_address2 = $request->input('shipping_address2');
            $note = $request->input('note');
            $product_id_arr = $request->input('product_id');
            $quantity_arr = $request->input('quantity');
            $delete_cart = $request->input('delete_cart');

            if($payment_method == 'none'){
                try {
                    //create account with email if email not exist
                    if(!User::where('email', $email)->exists()){
                        $user = new User();
                        $user->email = $email;
                        $user->save();
                    }

                    //create order
                    $user = User::where('email', $email)->first();
                    $order = new Order();
                    if(Auth::check()){
                        $order->user_id = Auth::user()->id;
                    }else{
                        $order->user_id = $user->id;
                    }
                    $order->first_name = $first_name;
                    $order->last_name = $last_name;
                    if(Auth::check()){
                        $order->email = Auth::user()->email;
                    }else{
                        $order->email = $email;
                    }
                    
                    $order->tel = $tel;
                    $order->total = 0;
                    $order->status = 0;
                    $order->shipping_address = $shipping_address;
                    $order->shipping_address2 = $shipping_address2;
                    // $order->payment_method = null;
                    $order->order_date = Carbon::now();
                    $order->note = $note;
                    $order->save();

                    //create order_products
                    $order = Order::orderBy('id','desc')->first();
                    $total = 0;
                    foreach($product_id_arr as $key => $product_id ){
                        $order_product = new OrderProduct();
                        $isSaling = (ProductHelper::IsSaling($product_id_arr[$key]));
                        $originPrice = ProductHelper::OriginPrice($product_id_arr[$key]);
                        if($isSaling)
                            $realPrice = ProductHelper::RealPrice($product_id);
                        $order_product->order_id = $order->id;
                        $order_product->product_id = $product_id;
                        $order_product->origin_price = $originPrice;
                        $order_product->sale_id = $isSaling;
                        $order_product->final_price = ($isSaling) ? $realPrice : $originPrice;
                        $order_product->quantity = $quantity_arr[$key];
                        $total += $order_product->final_price*$quantity_arr[$key];
                        $order_product->save();
                    }
                    $order->total = $total;
                    $order->update();

                    //delete cart after order
                    if($delete_cart){
                        Cart::where('user_id', Auth::user()->id)->delete();
                    }
                    
                    if(Auth::check()){
                        return view('user.pages.checkout',[
                            'pagename' => 'Thanh toán',
                            'product_id' => $product_id_arr,
                            'quantity' => $quantity_arr,
                            'title' => 'Thanh toán - '.env('STORE_NAME','PenWeb'),
                        ])->with('success','Đặt hàng thành công. Vui lòng kiểm tra lại lịch sử đặt hàng');
                    }
                    else{
                        return view('user.pages.checkout',[
                            'pagename' => 'Thanh toán',
                            'product_id' => $product_id_arr,
                            'quantity' => $quantity_arr,
                            'title'=> 'Thanh toán - '.env('STORE_NAME','PenWeb'),
                        ])->with('success','Đặt hàng thành công. Vui lòng kiểm tra lại lịch sử đặt hàng theo email đã cung cấp');
                    }
                } catch (\Throwable $th) {
                    return view('user.pages.checkout',[
                        'pagename' => 'Thanh toán',
                        'title' => 'Thanh toán - '.env('STORE_NAME','PenWeb'),
                        'product_id' => $product_id_arr,
                        'quantity' => $quantity_arr,
                    ])->with('error','Đặt hàng thất bại');
                }
                
            }
        }
    }

    public function history(){
        if(!Auth::check()){
            return redirect('');
        }
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id','desc')->paginate(env('USER_PAGINATE_ORDER_NUMBER',5));
        return view('user.pages.checkouthistory',[
            'orders' => $orders,
            'pagename' => 'Lịch sử đặt hàng',
            'title' => 'Lịch sử đặt hàng - '.env('STORE_NAME','PenWeb'),
        ]);
    }

    public function allcart(){
        $carts = Cart::where('user_id', Auth::user()->id)->orderBy('id','asc')->get();
        $link = route('user.checkout.index').'?';
        foreach ($carts as $key => $carts) {
            $link .= 'product_id[]='.$carts->product_id.'&quantity[]='.$carts->quantity.'&';
        }
        return redirect($link)->with('title','Thanh toán giỏ hàng - '.env('STORE_NAME','PenWeb'));
    }

}
