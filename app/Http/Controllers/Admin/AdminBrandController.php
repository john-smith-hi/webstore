<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCreateBrandRequest;
use App\Http\Requests\Admin\AdminUpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBrandController extends Controller
{
    public function index(Request $request){
        $search_query = trim($request->search_query);
        $brands = Brand::orderBy('id', 'DESC');
        if(!empty($search_query)){
            $brands = $brands->where('name','like', '%'.$search_query.'%')
            ->orWhere('email', 'like', '%'.$search_query.'%')
            ->orWhere('tel', 'like', '%'.$search_query.'%')
            ->orWhere('description', 'like', '%'.$search_query.'%')
            ->orWhere('address', 'like', '%'.$search_query.'%')
            ->paginate(env('ADMIN_PAGINATE_NUMBER'));
        }
        else{
            $brands = $brands->paginate(env('ADMIN_PAGINATE_NUMBER',5));
        }
        
        return view('admin.pages.brand.index',[
            'search_query' => $search_query,
            'brands' => $brands,
        ]);
    }

    public function create(){
        return view('admin.pages.brand.create');
    }

    public function store(AdminCreateBrandRequest $request){
        try {
            $path = ImageHelper::UploadBrand('image', $request);

            $brand = new Brand();
            $brand->name = $request->input('name');
            $brand->slug = Str::slug($brand->name);
            $brand->address = $request->input('address');
            $brand->tel = $request->input('tel');
            $brand->email = $request->input('email');
            $brand->description = $request->input('description');
            $brand->image = $path;
            $brand->save();
            return redirect()->route('admin.brand.index')->with('success', 'Thêm thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.brand.index')->with('error', 'Thêm thất bại');
        }
        
    }

    public function update($id){
        $brand = Brand::find($id);
        return view('admin.pages.brand.update',[
            'brand' => $brand,
        ]);
    }

    public function edit($id, AdminUpdateBrandRequest $request){
        try {
            $brand = Brand::find($id);
            $brand->name = $request->input('name');
            $brand->slug = Str::slug($brand->name);
            $brand->address = $request->input('address');
            $brand->tel = $request->input('tel');
            $brand->email = $request->input('email');
            $brand->description = $request->input('description');

            $path = (!empty($request->file('image'))) ? ImageHelper::UploadBrand('image', $request) : $brand->image;
            $brand->image = $path;
            $brand->update();
            return redirect()->route('admin.brand.update',['id'=>$id])->with('success','Cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.brand.update',['id'=>$id])->with('success','Cập nhật thất bại');
        }
        
    }

    public function delete($id){
        try {
            $brand = Brand::find($id);
            $brand->delete();
            return redirect()->route('admin.brand.index')->with('success','Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.brand.index')->with('error','Xóa thất bại');
        }
        
    }
}
