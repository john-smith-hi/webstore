<?php

namespace App\Http\Controllers;

use App\Mail\ComfirmEmailMail;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\Category;

class TestController extends Controller
{
    public function index(){
        dd(ProductImage::inRandomOrder()->take(3)->get());
    }

}
