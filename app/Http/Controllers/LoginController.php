<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmRequest;
use App\Http\Requests\LoginRequest;
use App\Mail\ComfirmEmailMail;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use Str;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    private function issetAccount($email){
        return (User::where('email',$email)->count()==1) ? true : false;
    }

    public function submit(LoginRequest $request){
        try {
            $email = $request->email;
            $token = Str::random(env('TOKEN_LENGTH','64'));
            $link = route('login.confirm')."?email=".$email."&token=".$token;
            Mail::to($email)->send(new ComfirmEmailMail($email,$link));
            if($this->issetAccount($email)){
                User::where('email',$email)->update([
                    'token' => $token,
                    'email_verified_at' => Carbon::now(),
                ]);
            }
            else {
                User::insert([
                    'email' => $email,
                    'token' => $token,
                    'email_verified_at' => Carbon::now(),
                    'role' => 0, // User
                ]);
            }
            return view('confirm',[
                'email' => $email,
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('login.index')->with('alert','Đăng nhập thất bại');
        }
        
    }

    public function confirm(ConfirmRequest $request){
        try {
            $remember_me = env('REMEMBER_ME',0);
            $email = $request->email;
            $token = $request->token;
            $user = User::where('email',$email)->firstOrFail();
            if($user){
                if($token !== $user->token){
                    return redirect()->route('login.index')->with('error','Mã xác thực không hợp lệ');
                }
                $email_verified_at = $user->email_verified_at; 
                $now = Carbon::now();
                //Cho phep xac thuc toi da 10 phut
                if(!$now->gt($email_verified_at) || !($now->diffInMinutes($email_verified_at) <= env('MAX_TIME_VERIFY_TOKEN','30'))){
                    return redirect()->route('login.index')->with('error','Quá thời gian '.env('MAX_TIME_VERIFY_TOKEN','10').' phút');
                }
                $user->token = null;
                $user->email_verified_at = null;
                $user->update();
                Auth::loginUsingId($user->id, $remember_me);
                if(Auth::user()->role===0)
                    return redirect()->route('user.home');
                if(Auth::user()->role===1)
                    return redirect()->route('admin.home.index');
                if(Auth::user()->role===2)
                    return redirect();
            }
            return redirect()->route('login.index')->with('error','Không tồn tại email');
        } catch (\Throwable $th) {
            return redirect()->route('login.index')->with('error','Đăng nhập thất bại');
        }
        
    }

    public function logout(){
        if(Auth::check()){
            if(Auth::user()->role===0){
                Auth::logout();
                return redirect()->back();
            }
            Auth::logout();
            return redirect()->route('login.index');
        }
        return redirect()->route('login.index');
    }
}
