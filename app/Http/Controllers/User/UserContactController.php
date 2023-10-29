<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class UserContactController extends Controller
{
    public function index(){
        return view('user.pages.contact',[
            'pagename' => 'Liên hệ',
            'title' => 'Liên hệ - '.env('STORE_NAME','PenWeb'),
        ]);
    }

    public function send(Request $request){
        try {
            $title = $request->subject;
            $body = $request->message;
            Mail::send('mail.contact', compact('title', 'body'), function($email){
                $email->to(env('EMAIL_CONTACT','leminhnhat10081999@gmail.com'), 'Liên hệ');
            });
            return view('user.pages.contact',[
                'pagename'=>'Liên hệ',
                'title' => 'Liên hệ - '.env('STORE_NAME','PenWeb'),
            ])->with('success','Gửi thành công');
        } catch (\Throwable $th) {
            return view('user.pages.contact',[
                'pagename'=>'Liên hệ',
                'title' => 'Liên hệ - '.env('STORE_NAME','PenWeb'),
            ])->with('error','Gửi thất bại');
        }
        
    }
}
