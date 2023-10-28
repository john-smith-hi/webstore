<?php

namespace App\Http\Controllers\Admin;

use App\Helper\GlobalVariableHelper;
use App\Http\Controllers\Controller;

use App\Models\GlobalVariable;
use Illuminate\Http\Request;

class AdminGlobalVariableController extends Controller
{
    public function index(Request $request){
        $search_query = $request->search_query;
        return view("admin.pages.global_var.index",[
            "search_query" => $search_query,
        ]);
    }

    public function create(Request $request){
        return view("admin.pages.global_var.create");
    }

    public function store(Request $request){
        try {
            //database
            $global_var = new GlobalVariable();
            $global_var->name = $request->name;
            $global_var->value = $request->value;
            $global_var->note = $request->note;
            $global_var->save();

            //.env
            GlobalVariableHelper::EnvCreate($global_var->name, $global_var->value);

            return redirect()->route("admin.global_var.index")->with("success","Thêm thành công");
        } catch (\Throwable $th) {
            return redirect()->route("admin.global_var.index")->with("error","Thêm thất bại");
        }
    }

    public function update_all(){
        //Delete all in database and update .env to database
        GlobalVariable::truncate();
        foreach ($_ENV as $name => $value) {
            try {
                $global_var = new GlobalVariable();
                $global_var->name = $name;
                $global_var->value = $value;
                $global_var->note = '';
                $global_var->save();
            } catch (\Throwable $th) {
                return redirect()->route('admin.global_var.index')->with('error','Cập nhật biến '. $name.' thất bại');
            }
        }
        return redirect()->route('admin.global_var.index')->with('success','Cập nhật toàn bộ thành công');
    }

    public function update($id){
        $global_var = GlobalVariable::find($id);
        return view("admin.pages.global_var.update",[
            "global_var"=> $global_var,
        ]);
    }

    public function edit($id, Request $request){
        try {
            //database
            $global_var = GlobalVariable::find($id);
            $global_var->name = $request->name;
            $global_var->value = $request->value;
            $global_var->note = $request->note;
            $global_var->update();

            //.env
            GlobalVariableHelper::EnvUpdate($global_var->name, $global_var->value);

            return redirect()->back()->with("success","Cập nhật thành công");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error","Cập nhật thất bại");
        }
    }

    public function delete($id){
        try {
            $global_var = GlobalVariable::find($id);
            
            //.env
            GlobalVariableHelper::EnvDelete($global_var->name);

            //database
            $global_var->delete();

            return redirect()->route("admin.global_var.index")->with("success","Xóa thành công");
        } catch (\Throwable $th) {
            return redirect()->route("admin.global_var.index")->with("error","Xóa thất bại");
        }
    }
}
