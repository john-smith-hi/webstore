<?php

namespace App\Http\Controllers;

use App\Helper\DateHelper;
use App\Http\Requests\Admin\AdminCreateSaleRequest;
use App\Models\Product;
use App\Models\SaleProduct;
use Illuminate\Http\Request;

class AdminSaleController extends Controller
{
    public function index(Request $request){
        $product_id = $request->product_id;
        $product_name = $request->product_name;
        $start_date = $request->start_date;
        $finish_date = $request->finish_date;   
        $sales = SaleProduct::join('products', 'sale_products.product_id', '=', 'products.id')->select('sale_products.id','product_id','sale_price','sale_percent','start_date','finish_date','sale_products.status','products.name','products.price');
        if(!empty($product_id))
            $sales = $sales->where('product_id', $product_id);
        if(!empty($product_name))
            $sales = $sales->where('products.name','like', '%'.$product_name.'%');
        if(!empty($start_date))
            $sales = $sales->where('start_date', '>=', $start_date);
        if(!empty($finish_date))
            $sales = $sales->where('finish_date', '<=', $finish_date);
        $sales = $sales->orderBy('sale_products.id','desc')->paginate(env('ADMIN_PAGINATE_NUMBER',5));
        return view('admin.pages.sale.index',[
            'DateHelper' => new DateHelper(),
            'Product' => new Product(),
            'product_name' => $product_name,
            'start_date' => $start_date,
            'finish_date' => $finish_date,
            'sales' => $sales,
        ]);
    }

    public function create(){
        return view('admin.pages.sale.create');
    }

    public function store(AdminCreateSaleRequest $request){
        try {
            $sale = new SaleProduct();
            $sale->product_id = $request->input('product_id');
            $sale->sale_price = $request->input('sale_price');
            $sale->sale_percent = $request->input('sale_percent');
            $sale->start_date = $request->input('start_date');
            $sale->finish_date = $request->input('finish_date');
            $sale->status = $request->input('status');
            $sale->save();
            return redirect()->route('admin.sale.index')->with('success','Thêm thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.sale.index')->with('error','Thêm thất bại');
        }
    }

    public function update($id){
        $sale = SaleProduct::find($id);
        return view('admin.pages.sale.update',[
            'Product' => new Product(),
            'sale' => $sale,
        ]);
    }

    public function edit($id, AdminCreateSaleRequest $request){
        try {
            $sale = SaleProduct::find($id);
            $sale->product_id = $request->input('product_id');
            $sale->sale_price = $request->input('sale_price');
            $sale->sale_percent = $request->input('sale_percent');
            $sale->start_date = $request->input('start_date');
            $sale->finish_date = $request->input('finish_date');
            $sale->status = $request->input('status');
            $sale->update();
            return redirect()->route('admin.sale.update',['id'=>$id])->with('success','Cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.sale.update',['id'=>$id])->with('error','Cập nhật thất bại');
        }
    }

    public function delete($id){
        try {
            $sale = SaleProduct::find($id);
            $sale->delete();
            return redirect()->route('admin.sale.index')->with('success','Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.sale.index')->with('success','Xóa thất bại');
        }
    }
}
