<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCreateCategoryRequest;
use App\Http\Requests\Admin\AdminUpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    private $categoriesParent;

    function __construct(){
        $this->categoriesParent = $this->CategoriesParent();
    }
    public function CategoriesParent(){
        return Category::where('parent_id', '0')->get();
    }

    public function index(){
        return view('admin.pages.category.index',[
            'Category' => new Category(),
            'categoriesParent' => $this->categoriesParent,
        ]);
    }

    public function create(){
        return view('admin.pages.category.create',[
            'categoriesParent' => $this->categoriesParent,
        ]);
    }

    public function store(AdminCreateCategoryRequest $request){
        try {
            $category = new Category();
            $category->name = $request->input('name');
            $category->slug = Str::slug($category->name);
            $category->parent_id = $request->input('parent_id');
            $category->save();
            return redirect()->route('admin.category.index')->with('success','Thêm thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.category.index')->with('error','Thêm thất bại');
        }
        
    }

    public function update($id){
        $category = Category::find($id);
        return view('admin.pages.category.update',[
            'category' => $category,
            'categoriesParent' => $this->categoriesParent,
        ]);
    }

    public function edit($id, AdminUpdateCategoryRequest $request){
        try {
            $category = Category::find($id);
            $category->name = $request->input('name');
            $category->slug = Str::slug($category->name);
            $category->parent_id = $request->input('parent_id');
            $category->update();
            return redirect()->route('admin.category.update',['id'=>$id])->with('success','Cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.category.update',['id'=>$id])->with('error','Cập nhật thất bại');
        }
        
    }

    public function delete($id){
        try {
            $category = Category::find($id);
            if($category->parent_id == 0)
            {
                //Delete parent will change children to 0
                Category::where('parent_id', $id)
                ->update([
                    'parent_id' => '0'
                ]);
            }
            $category->delete();
            return redirect()->route('admin.category.index')->with('success','Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.category.index')->with('error','Xóa thất bại');
        }
        
    }
}
