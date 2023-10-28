<?php

namespace App\Http\Controllers\Admin;

use App\Helper\AccountHelper;
use App\Helper\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCreateAccountRequest;
use App\Http\Requests\Admin\AdminUpdateAccountRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminAccountController extends Controller
{
    public function index(Request $request){
        $search_query = $request->search_query;
        $role = $request->role;
        $users = new User();
        if(!($role=='')){
            $users = $users->where('role',$role);
        }
        $users = $users->where(function($query) use ($search_query){
                                $query->where('first_name','like','%'.$search_query.'%')
                                        ->orWhere('last_name','like','%'.$search_query.'%')
                                        ->orWhere('tel','like','%'.$search_query.'%')
                                        ->orWhere('email','like','%'.$search_query.'%');
                            })
                        ->orderBy('id','desc')
                        ->paginate(env('ADMIN_PAGINATE_NUMBER'));
        return view('admin.pages.account.index',[
            'search_query' => $search_query,
            'role' => $role,
            'AccountHelper' => new AccountHelper(),
            'users' => $users,
        ]);
    }

    public function create(){
        return view('admin.pages.account.create');   
    }

    public function store(AdminCreateAccountRequest $request){
        try {
            $user = new User();
            $user->tel = $request->input('tel');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->gender = $request->input('gender');
            $user->role = $request->input('role');

            $path = (!empty($request->file('avatar'))) ? ImageHelper::UploadAvatar('avatar', $request) : $user->avatar;
            $user->avatar = $path;
            $user->save();
            
            return redirect()->route('admin.account.index')->with('success','Thêm thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.account.index')->with('error','Thêm thất bại');
        }
        
    }
    public function update($id){
        $user = User::find($id);
        return view('admin.pages.account.update',[
            'user' => $user,
        ]);
    }

    public function edit($id, AdminUpdateAccountRequest $request){
        try {
            $user = User::find($id);
            $user->tel = $request->input('tel');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->gender = $request->input('gender');
            $user->role = $request->input('role');

            $path = (!empty($request->file('avatar'))) ? ImageHelper::UploadAvatar('avatar', $request) : $user->avatar;
            $user->avatar = $path;
            $user->update();
            return redirect()->route('admin.account.update',['id'=>$id])->with('success','Cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.account.update',['id'=>$id])->with('error','Cập nhật thất bại');
        }
        
    }

    public function delete($id){
        try {
            $user = User::find($id);
            $user->delete();
            return redirect()->route('admin.account.index')->with('success','Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.account.index')->with('error','Xóa thất bại');
        }
        
    }

    
}
