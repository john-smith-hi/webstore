<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAboutusController extends Controller
{
    public function index(){
        return view('user.pages.aboutus',[
            'pagename' => 'Giới thiệu',
            'title' => 'Giới thiệu - '.env('STORE_NAME','PenWeb'),
        ]);
    }
}
