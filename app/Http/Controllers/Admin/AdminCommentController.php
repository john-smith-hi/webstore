<?php

namespace App\Http\Controllers\Admin;

use App\Helper\DateHelper;
use App\Helper\StringHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUpdateCommentRequest;
use App\Models\Product;
use App\Models\ProductComment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index(Request $request){
        $search_product_name = $request->search_product_name;
        $product_id = $request->product_id;
        $comments = ProductComment::join('products','product_comments.product_id','=','products.id')->select('product_comments.id', 'product_comments.product_id','product_comments.user_id','product_comments.comment','product_comments.created_at');
        if(!empty($product_id))
        {   
            $comments = $comments->where('product_comments.product_id',$product_id);
        }
        $comments = $comments->orderBy('id','desc')->paginate(env('ADMIN_PAGINATE_NUMBER'));
        return view('admin.pages.comment.index',[
            'User' => new User(),
            'Product' => new Product(),
            'StringHelper' => new StringHelper(),
            'DateHelper' => new DateHelper(),
            'comments' => $comments,
            'search_product_name' => $search_product_name,
            'product_id' => $product_id,
        ]);
    }

    public function update($id){
        $comment = ProductComment::find($id);
        $user = User::find($comment->user_id);
        $product = Product::find($comment->product_id);
        return view('admin.pages.comment.update',[
            'user' => $user,
            'product' => $product,
            'comment'=>$comment,
            'DateHelper' => new DateHelper(),
        ]);
    }

    public function edit($id, AdminUpdateCommentRequest $request){
        try {
            $comment = ProductComment::find($id);
            $comment->comment = $request->comment;
            $comment->update();
            return redirect()->route('admin.comment.update',['id'=>$id])->with('success','Cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.comment.update',['id'=>$id])->with('error','Cập nhật thất bại');
        }
        
    }

    public function delete($id){
        try {
            $comment = ProductComment::find($id);
            $comment->delete();
            return redirect()->route('admin.comment.index')->with('success','Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.comment.index')->with('success','Xóa thất bại');
        }
        
    }
}
