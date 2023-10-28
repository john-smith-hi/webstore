<?php

namespace App\Http\Controllers;

use App\Mail\ComfirmEmailMail;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;

class TestController extends Controller
{
    public function index(){
        var_dump(Auth::user());
    }

}
