<?php

namespace App\Http\Controllers\Admin;

use App\Helper\DateHelper;
use App\Helper\StorageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCreateInputStorageRequest;
use App\Models\Product;
use App\Models\StorageHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminStorageController extends Controller
{
    protected $inputStorages;
    protected $outputStorages;

    function __construct(){
        $this->inputStorages = StorageHistory::where('status',0)->paginate(env('ADMIN_PAGINATE_NUMBER',5));
        $this->outputStorages = StorageHistory::where('status',1)->paginate(env('ADMIN_PAGINATE_NUMBER',5));
    }
 
    //Input
    public function inputIndex(Request $request){
        $product_id = $request->product_id;
        $product_name = $request->product_name;
        if(!empty($product_id))
            $product_name = Product::find($product_id)->name;
        $start_date = $request->start_date;
        $finish_date = $request->finish_date;
        $storages = StorageHistory::join('products','storage_histories.product_id','=','products.id')->select('storage_histories.id','storage_histories.product_id','storage_histories.quantity','storage_histories.price','storage_histories.status','storage_histories.created_at')->where('status',0);
        if(!empty($product_id))
            $storages = $storages->where('storage_histories.product_id',$product_id);
        else if(!empty($product_name)){
            $storages = $storages->where('products.name','like','%'.$product_name.'%');
        }
        if(!empty($start_date) && !empty($finish_date)){
            $storages = $storages->where('storage_histories.created_at','>=',$start_date)
                                 ->where('storage_histories.created_at','<=',$finish_date.' 23:59:59');
        }
        else {
            if(!empty(($start_date)))
                $storages = $storages->where('storage_histories.created_at','>=',$start_date);
            if(!empty($finish_date))
                $storages = $storages->where('storage_histories.created_at','<=',$finish_date.' 23:59:59');
        }
        $storages = $storages->orderBy('storage_histories.id','desc')->paginate(env('ADMIN_PAGINATE_NUMBER'));
        return view('admin.pages.storage.input.index',[
            'DateHelper' => new DateHelper(),
            'Product' => new Product(),
            'inputStorages' => $storages,
            'product_name' => $product_name,
            'start_date' => $start_date,
            'finish_date' => $finish_date,
        ]);
    }

    public function inputCreate(Request $request){
        return view('admin.pages.storage.input.create');
    }

    public function inputStore(AdminCreateInputStorageRequest $request){
        try {
            //Check status_storage
            $product = Product::find($request->product_id);
            if($product->status_storage == 0){
                return redirect()->route('admin.storage.input.create')->with('error','Sản phẩm đã đóng nhập / xuất kho');
            }

            $storageInput = new StorageHistory();
            $storageInput->product_id = $request->product_id;
            $storageInput->quantity = $request->quantity;
            $storageInput->price = $request->price;
            $storageInput->status = 0;
            $storageInput->save();
            return redirect()->route('admin.storage.input.index')->with('success','Thêm thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.storage.input.index')->with('error','Thêm thất bại');
        }
        
    }

    public function inputUpdate($id, Request $request){
        $inputStorage = StorageHistory::find($id);
        return view('admin.pages.storage.input.update',[
            'Product' => new Product(),
            'inputStorage' => $inputStorage,
        ]);
    }

    public function inputEdit($id, AdminCreateInputStorageRequest $request){
        try {
            //Check status_storage
            $product = Product::find($request->product_id);
            if($product->status_storage == 0){
                return redirect()->route('admin.storage.input.update',['id'=>$id])->with('error','Sản phẩm đã đóng nhập / xuất kho');
            }

            $storageInput = StorageHistory::find($id);
            $storageInput->product_id = $request->product_id;
            $storageInput->quantity = $request->quantity;
            $storageInput->price = $request->price;
            $storageInput->status = 0;
            $storageInput->update();
            return redirect()->route('admin.storage.input.index')->with('success','Cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.storage.input.index')->with('error','Cập nhật thất bại');
        }
    }

    public function inputDelete($id){
        try {
            $inputStorage = StorageHistory::find($id);
            //Check status_storage
            $product = Product::find($inputStorage->product_id);
            if($product->status_storage == 0){
                return redirect()->route('admin.storage.input.index',['id'=>$id])->with('error','Sản phẩm đã đóng nhập / xuất kho');
            }
            $inputStorage->delete();
            return redirect()->route('admin.storage.input.index')->with('success','Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.storage.input.index')->with('success','Xóa thất bại');
        }
        
    }

    //Output
    public function outputIndex(Request $request){
        $product_id = $request->product_id;
        $product_name = $request->product_name;
        if(!empty($product_id))
            $product_name = Product::find($product_id)->name;
        $start_date = $request->start_date;
        $finish_date = $request->finish_date;
        $storages = StorageHistory::join('products','storage_histories.product_id','=','products.id')->select('storage_histories.id','storage_histories.product_id','storage_histories.quantity','storage_histories.price','storage_histories.status','storage_histories.created_at')->where('status',1);
        if(!empty($product_id))
            $storages = $storages->where('storage_histories.product_id',$product_id);
        else if(!empty($product_name)){
            $storages = $storages->where('products.name','like','%'.$product_name.'%');
        }
        if(!empty($start_date) && !empty($finish_date)){
            $storages = $storages->where('storage_histories.created_at','>=',$start_date)
                                 ->where('storage_histories.created_at','<=',$finish_date.' 23:59:59');
        }
        else {
            if(!empty(($start_date)))
                $storages = $storages->where('storage_histories.created_at','>=',$start_date);
            if(!empty($finish_date))
                $storages = $storages->where('storage_histories.created_at','<=',$finish_date.' 23:59:59');
        }
        $storages = $storages->orderBy('storage_histories.id','desc')->paginate(env('ADMIN_PAGINATE_NUMBER'));
        return view('admin.pages.storage.output.index',[
            'DateHelper' => new DateHelper(),
            'Product' => new Product(),
            'outputStorages' => $storages,
            'product_name' => $product_name,
            'start_date' => $start_date,
            'finish_date' => $finish_date,
        ]);
    }

    public function outputCreate(Request $request){
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        return view('admin.pages.storage.output.create',[
            'product_id' => $product_id,
            'product' => $product,
        ]);
    }

    public function outputStore(AdminCreateInputStorageRequest $request){
        try {
            //Check status_storage
            $product = Product::find($request->product_id);
            if($product->status_storage == 0){
                return redirect()->route('admin.storage.output.create')->with('error','Sản phẩm đã đóng nhập / xuất kho');
            }

            //Check quantity output
            $quantity = StorageHelper::Quantity($request->product_id);
            if($request->quantity > $quantity){
                return redirect()->route('admin.storage.output.create')->with('error','Số lượng xuất lớn hơn số lượng tồn : '.$quantity);
            }
            $storageOutput = new StorageHistory();
            $storageOutput->product_id = $request->product_id;
            $storageOutput->quantity = $request->quantity;
            $storageOutput->price = $request->price;
            $storageOutput->status = 1;
            $storageOutput->save();
            return redirect()->route('admin.storage.output.index')->with('success','Thêm thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.storage.output.index')->with('error','Thêm thất bại');
        }
        
    }

    public function outputUpdate($id, Request $request){
        $outputStorage = StorageHistory::find($id);
        return view('admin.pages.storage.output.update',[
            'Product' => new Product(),
            'outputStorage' => $outputStorage,
        ]);
    }

    public function outputEdit($id, AdminCreateInputStorageRequest $request){
        try {
            //Check status_storage
            $product = Product::find($request->product_id);
            if($product->status_storage == 0){
                return redirect()->route('admin.storage.output.update',['id'=>$id])->with('error','Sản phẩm đã đóng nhập / xuất kho');
            }
            //Check quantity output
            $quantity = StorageHelper::Quantity($request->product_id);
            if($request->quantity > $quantity){
                return redirect()->route('admin.storage.output.update',['id'=>$id])->with('error','Số lượng xuất lớn hơn số lượng tồn : '.$quantity);
            }
            $storageInput = StorageHistory::find($id);
            $storageInput->product_id = $request->product_id;
            $storageInput->quantity = $request->quantity;
            $storageInput->price = $request->price;
            $storageInput->status = 1;
            $storageInput->update();
            return redirect()->route('admin.storage.output.index')->with('success','Cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.storage.output.index')->with('error','Cập nhật thất bại');
        }
    }

    public function outputDelete($id){
        try {
            $storageOutput = StorageHistory::find($id);
            //Check status_storage
            $product = Product::find($storageOutput->product_id);
            if($product->status_storage == 0){
                return redirect()->route('admin.storage.output.update',['id'=>$id])->with('error','Sản phẩm đã đóng nhập / xuất kho');
            }
            $storageOutput->delete();
            return redirect()->route('admin.storage.output.index')->with('success','Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.storage.output.index')->with('error','Xóa thất bại');
        }
        
    }
}
