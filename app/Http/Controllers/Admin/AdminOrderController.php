<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request){
        $search_query = trim($request->search_query);
        $orders = Order::orderBy('id','desc')
                       ->where('first_name','like','%'.$search_query.'%')
                       ->orWhere('last_name','like','%'.$search_query.'%')
                       ->orWhere('tel','like','%'.$search_query.'%')
                       ->orWhere('email','like','%'.$search_query.'%')
                       ->paginate(env('ADMIN_PAGINATE_NUMBER',5));
        return view('admin.pages.order.index',[
            'orders' => $orders,
        ]);
    }

    public function update($id){
        $order = Order::find($id);
        $orderProducts = OrderProduct::where('order_id', $order->id)->get();
        return view('admin.pages.order.update',[
            'order' => $order,
            'orderProducts' => $orderProducts,
        ]);
    }

    public function edit($id, AdminUpdateOrderRequest $request){
        try {
            $order = Order::find($id);
            if(!empty($request->receive_date) && empty($request->delivery_date))
            {
                return redirect()->route('admin.order.update',['id'=>$id])->with('error','Ngày giao hàng còn thiếu');
            }
            $order->delivery_date = $request->delivery_date;
            $order->receive_date = $request->receive_date;
            $order->shipping_address = $request->shipping_address;
            $order->shipping_address2 = $request->shipping_address2;
            $order->note = $request->note;
            $order->status = $request->status;
            $order->update();
            return redirect()->route('admin.order.update',['id'=>$id])->with('success','Cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.order.update',['id'=>$id])->with('error','Cập nhật thất bại');
        }
        
    }

    public function delete($id){
        try {
            $order = Order::find($id);
            $order->detele();
            $orderProduct = OrderProduct::where('order_id', $id);
            $orderProduct->delete();
            return redirect()->route('admin.order.index')->with('success','Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.order.index')->with('error','Xóa thất bại');
        }
        
    }
}
