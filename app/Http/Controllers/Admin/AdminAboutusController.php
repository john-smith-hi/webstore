<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUpdateAboutusRequest;
use App\Models\Aboutus;
use Illuminate\Http\Request;

class AdminAboutusController extends Controller
{
    public function index(){
        return view("admin.pages.aboutus.index");
    }

    public function edit(AdminUpdateAboutusRequest $request){
        try {
            $text = $request->input("text");
            $aboutus = new Aboutus();
            $aboutus->text = $text;
            $aboutus->save();
            return view("admin.pages.aboutus.index")->with('success','Cập nhật thành công');
        } catch (\Throwable $th) {
            return view("admin.pages.aboutus.index")->with('error','Cập nhật thất bại');
        }
    }
}
