<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ImageHelper;
use App\Helper\StorageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCreateProductRequest;
use App\Http\Requests\Admin\AdminUpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    protected $categories;
    protected $brands;

    function __construct(){
        $this->categories = Category::all();
        $this->brands = Brand::all();
    }
    
    public function index(Request $request){
        $search_query = $request->search_query;
        $products = Product::orderBy('id', 'DESC');
        if(!empty($search_query)){
            $products = $products->where('name','like', '%'.$search_query.'%');
        }
        $products = $products->paginate(env('ADMIN_PAGINATE_NUMBER',5));
        return view('admin.pages.product.index',[
            'search_query' => $search_query,
            'products' => $products,
        ]);
    }

    public function create(){
        return view('admin.pages.product.create',[
            'categories' => $this->categories,
            'brands' => $this->brands,
            ]);
    }

    public function store(AdminCreateProductRequest $request){
        try {
                //info  
                $product = new Product();
                $product->name = $request->input('name');
                $product->slug = Str::slug($product->name);
                $product->price = $request->input('price');
                $product->summary = $request->input('summary');
                $product->description = $request->input('description');
                $product->information = $request->input('information');
                $product->category_id = $request->input('category_id');
                $product->brand_id = $request->input('brand_id');
                $product->status_storage = $request->input('status_storage');
                $product->status_sell = $request->input('status_sell');
                $product->save();

                $productLast = Product::orderBy('id', 'desc')->first();
                //multi image
                $paths = ImageHelper::UploadProductImageMulti('images', $request, 'products');
                foreach($paths as $path){
                    $product_image = new ProductImage();
                    $product_image->product_id = $productLast->id;
                    $product_image->image = $path;
                    $product_image->save();
                }

                //tags
                $tags = explode('#', $request->tags);
                foreach($tags as $tag){
                    if(empty($tag)) continue;
                    $product_tag = new ProductTag();
                    $product_tag->product_id = $productLast->id;
                    $product_tag->tag = trim($tag);
                    $product_tag->save();
                }
                return redirect()->route('admin.product.index')->with('success','Thêm thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.product.index')->with('error','Thêm thất bại');
        }
    }

    public function update($id){
        $product = Product::find($id);
        $images = ProductImage::where('product_id', $id)->get();
        $tags = ProductTag::where('product_id', $id)->get();
        $quantity = StorageHelper::Quantity($id);
        return view('admin.pages.product.update',[
            'product' => $product,
            'images' => $images,
            'tags' => $tags,
            'categories' => $this->categories,
            'brands' => $this->brands,
            'quantity' => $quantity,
        ]);
    }

    public function deleteImage($id){
        try {
            $productImage = ProductImage::find($id);
            $productImage->delete();
            return redirect()->route('admin.product.update', ['id'=>$productImage->product_id])->with('success','Xóa ảnh thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.product.update', ['id'=>$productImage->product_id])->with('error','Xóa ảnh thất bại');
        }
        
    }

    public function edit($id, AdminUpdateProductRequest $request){
        try {
            //Info
            $product = Product::find($id);
            $product->name = $request->input('name');
            $product->slug = Str::slug($product->name);
            $product->price = $request->input('price');
            $product->summary = $request->input('summary');
            $product->description = $request->input('description');
            $product->information = $request->input('information');
            $product->category_id = $request->input('category_id');
            $product->category_id = $request->input('category_id');
            $product->brand_id = $request->input('brand_id');
            $product->status_storage = $request->input('status_storage');
            $product->status_sell = $request->input('status_sell');
            $product->update();

            //multi image
            $paths = ImageHelper::UploadProductImageMulti('images', $request, 'products');
            
            foreach($paths as $path){
                $product_image = new ProductImage();
                $product_image->product_id = $id;
                $product_image->image = $path;
                $product_image->save();
            }

            //tags
            ProductTag::where('product_id', $id)->delete();
            $tags = explode('#', $request->tags);
            
            foreach($tags as $tag){
                if(empty($tag)) continue;
                $product_tag = new ProductTag();
                $product_tag->product_id = $id;
                $product_tag->tag = trim($tag);
                $product_tag->save();
            }

            return redirect()->route('admin.product.update',['id'=>$id])->with('success','Cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.product.update',['id'=>$id])->with('error','Cập nhật thất bại');
        }
    }

    public function delete($id){
        try {
            $product = Product::find($id);
            $product->delete();
            return redirect()->route('admin.product.index')->with('success','Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.product.index')->with('success','Xóa thất bại');
        }
        
    }

    public function search_name($search_name){
        $products = Product::where('name','like','%'.$search_name.'%')->take(env('ADMIN_SEARCH_NAME_RESULT'))->get();
        foreach ($products as $key => $product) {
            echo "
            <div class='media' >
                <div class='media-body' data-id='".$product->id."' data-name='".$product->name."' data-price='".$product->price."'>
                    <div>
                        ".$product->name." - ".number_format($product->price, 0, ',','.')." đ
                    </div>
                </div>
            </div>";
        }
    }
}
