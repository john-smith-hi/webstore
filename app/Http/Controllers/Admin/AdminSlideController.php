<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCreateSlideRequest;
use App\Http\Requests\Admin\AdminDeleteSlideRequest;
use App\Http\Requests\Admin\AdminUpdateSlideRequest;
use App\Http\Requests\AdminStoreProfileRequest;
use App\Models\Slide;
use Illuminate\Http\Request;

class   AdminSlideController extends Controller
{
    public function index(){
        return view('admin.pages.slide');
    }

    public function update($id, AdminUpdateSlideRequest $request){
        try {
            $slide = Slide::find($id);
            $slide->link = $request->input('link');
            $slide->update();
            return redirect()->route('admin.slide.index')->with('success','Cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.slide.index')->with('error','Cập nhật thất bại');
        }
       
    }

    public function store(AdminCreateSlideRequest $request){
        try {
            $path = ImageHelper::UploadSlide('slide', $request);
            $slide = new Slide();
            $slide->image = $path;
            $slide->link = $request->input('link');
            $slide->save();
            return redirect()->route('admin.slide.index')->with('success','Thêm thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.slide.index')->with('error','Thêm thất bại');
        }
        
    }

    public function delete($id){
        try {
            $slide = Slide::find($id);
            $slide->delete();
            return redirect()->route('admin.slide.index')->with('success','Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.slide.index')->with('error','Xóa thất bại');
        }
        
    }
}
