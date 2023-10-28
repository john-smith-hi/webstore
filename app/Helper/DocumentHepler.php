<?php
namespace App\Helper;
use Auth;
use Illuminate\Http\Request;

class DocumentHepler{

    protected $image;
    public function __construct(){

    }

    public static function Upload($nameRequest, Request $request, $nameStoreAs='docs'){
        $file = $request->file($nameRequest);
        $ext = $file->getClientOriginalExtension();
        if($ext !== 'pdf') return redirect()->route('login.index');
        $path = '/storage/'.$file->store($nameStoreAs);
        return $path;
    }

}