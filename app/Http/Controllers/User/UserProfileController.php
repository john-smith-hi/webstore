<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserUpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;


class UserProfileController extends Controller
{
    public function index(){
        return view("user.pages.profile",[
            'pagename' => 'Thông tin cá nhân',
            'title' => 'Thông tin cá nhân - '.env('STORE_NAME','PenWeb'),
        ]);
    }

    public function edit(UserUpdateProfileRequest $request){
        try {
            $user = User::find(auth()->user()->id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->gender = $request->gender;
            $user->tel = $request->tel;
            $user->address = $request->address;
            $user->update();
            return redirect()->route('user.profile.index')->with('success','Cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->route('user.profile.index')->with('error','Cập nhật thất bại');
        }
        
    }
}
