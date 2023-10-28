<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUpdateProfileRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function index(){
        return view('admin.pages.profile');
    }

    public function update(AdminUpdateProfileRequest $request){
        try {
            $admin = User::find(Auth::user()->id);
            $admin->tel = $request->input('tel');
            $admin->email = $request->input('email');
            $admin->address = $request->input('address');
            $admin->first_name = $request->input('first_name');
            $admin->last_name = $request->input('last_name');
            $admin->gender = $request->input('gender');

            $path = (!empty($request->file('avatar'))) ? ImageHelper::UploadAvatar('avatar', $request) : $admin->avatar;
            $admin->avatar = $path;
            $admin->update();
            return redirect()->route('admin.profile.index')->with('success','Cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.profile.index')->with('error','Cập nhật thất bại');
        }
    }
}
