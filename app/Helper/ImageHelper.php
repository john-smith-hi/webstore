<?php
namespace App\Helper;
use Auth;
use Illuminate\Http\Request;

class ImageHelper{

    protected $image;
    public function __construct(){

    }

    public static function Upload($nameRequest, Request $request, $nameStoreAs='images'){
        $file = $request->file($nameRequest);
        $ext = $file->getClientOriginalExtension();
        if($ext === 'php') return redirect()->route('login.index');
        $path = '/storage/'.$file->store($nameStoreAs);
        return $path;
    }

    public static function UploadMulti($nameRequest, Request $request, $nameStoreAs='images'){
        $files = $request->file($nameRequest);
        $path = [];
        foreach($files as $file){
            $ext = $file->getClientOriginalExtension();
            if($ext === 'php') return redirect()->route('login.index');
            $pathx = '/storage/'.$file->store($nameStoreAs);
            $path[] = $pathx;
        }
        return $path;
    }

    public static function UploadAvatar($nameRequest='avatar', Request $request, $nameStoreAs='avatars') {
        if(!$request->hasFile('avatar')) return Auth::user()->avatar;

        $path = ImageHelper::Upload($nameRequest, $request, $nameStoreAs);
        return $path;
    }

    public static function UploadSlide($nameRequest='slide', Request $request, $nameStoreAs='slides') {
        if(!$request->hasFile('slide')) return '';

       $path = ImageHelper::Upload($nameRequest, $request, $nameStoreAs);
        return $path;
    }

    public static function UploadBrand($nameRequest='image', Request $request, $nameStoreAs='brands') {
        if(!$request->hasFile('image')) return '';

        $path = ImageHelper::Upload($nameRequest, $request, $nameStoreAs);
        return $path;
    }

    public static function UploadProductImageMulti($nameRequest='products', Request $request, $nameStoreAs='products'){
        if(!$request->hasFile('images')) return [];
        
        $path = ImageHelper::UploadMulti($nameRequest, $request, $nameStoreAs);
        return $path;
    }

}