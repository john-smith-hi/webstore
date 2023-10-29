<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserAddCartRequest;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCartController extends Controller
{
    public function index(){
        $carts = Cart::where("user_id",Auth::user()->id)->get(); 
        return view('user.pages.cart',[
            'pagename' => 'Giỏ hàng',
            'title' => 'Giỏ hàng',
            'carts'=> $carts,
        ]);
    }

    public function add(UserAddCartRequest $request){
        if(Auth::check()){
            try {
                $product_id = $request->input('product_id');
                $quantity = $request->input('quantity',1);
                $cart = Cart::where('user_id',Auth::user()->id)->where('product_id', $product_id);
                if($cart->count()==1){
                    $cart = $cart->first();
                    $cart->quantity = $quantity+$cart->quantity;
                    $cart->update();
                    return redirect()->route('user.cart.index');
                }
                $cart1 = new Cart();
                $cart1->user_id = Auth::user()->id;
                $cart1->product_id = $product_id;
                $cart1->quantity = $quantity;
                $cart1->save();
                return redirect()->route('user.cart.index');
            } catch (\Throwable $th) {
                return redirect()->route('user.cart.index');
            }
        }
        else {
            return redirect()->route('login.index');
        }
    }

    public function edit(UserAddCartRequest $request){
        if(Auth::check()){
            try {
                $product_id = $request->input('product_id');
                $quantity = $request->input('quantity',1);
                $cart = Cart::where('user_id',Auth::user()->id)->where('product_id',$product_id);
                if($cart->count() > 0){
                    if($quantity == 0){
                        $cart->delete();
                    }
                    else{
                        $cart->update(['quantity'=>$quantity]);
                    }
                }
                return redirect()->route('user.cart.index');
            } catch (\Throwable $th) {
                return redirect()->route('user.cart.index');
            }
        }
        else{
            return redirect()->route('login.index');
        }
    }

    public function editmulti(Request $request){
        if(Auth::check()){
            try {
                $product_id = $request->input('product_id');
                $quantity = $request->input('quantity');
                for($i=0; $i<count($product_id); $i++){
                    $cart = Cart::where('user_id',Auth::user()->id)->where('product_id',$product_id[$i]);
                    if($cart->count() > 0){
                        if($quantity[$i] == 0){
                            $cart->delete();
                        }
                        else{
                            $cart->update(['quantity'=>$quantity[$i]]);
                        }
                    }
                    else {
                        return redirect()->route('user.cart.index')->with('error','Cập nhật thất bại');
                    }
                }
                return redirect()->route('user.cart.index')->with('success','Cập nhật thành công');
            } catch (\Throwable $th) {
                return redirect()->route('user.cart.index')->with('error','Cập nhật thất bại');
            }
        }
        else{
            return redirect()->route('login.index');
        }
    } 

    public function delete(Request $request){
        if(Auth::check()){
            try {
                $product_id = $request->input('product_id_delete');
                $cart = Cart::where('user_id',Auth::user()->id)->where('product_id',$product_id);
                $cart->delete();
                return redirect()->route('user.cart.index');
            } catch (\Throwable $th) {
                return redirect()->route('user.cart.index');
            }
        }
        else{
            return redirect()->route('login.index');
        }
    }
}
