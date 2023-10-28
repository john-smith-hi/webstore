<?php
namespace App\Helper;
use Auth;
use Illuminate\Http\Request;

class GlobalVariableHelper{
    public static function EnvCreate($name, $value=''){
        $path = base_path('.env');
        if(preg_match('/\s/',$value))
            $newData = PHP_EOL.$name."='".$value."'";
        else
            $newData = PHP_EOL.$name.'='.$value;
        if (file_exists($path)) {
            file_put_contents($path, $newData ,FILE_APPEND);
        }
    }

    public static function EnvUpdate($name, $newValue=''){
        $path = base_path('.env');
        $oldData = file_get_contents($path);
        $oldValue = (env($name) === true) ? 'true' : env($name);
        if(preg_match('/\s/',$newValue))
            $newData = str_replace($name.'='.$oldValue, $name."='".$newValue."'", $oldData); 
        else
            $newData = str_replace($name.'='.$oldValue, $name.'='.$newValue, $oldData);
        if (file_exists($path)) {
            file_put_contents($path, $newData);
        }
    }

    public static function EnvDelete($name){
        $path = base_path('.env');
        $oldData = file_get_contents($path);
        $oldValue = (env($name) === true) ? 'true' : env($name);
        if(preg_match('/\s/',$oldValue))
            $newData = str_replace($name."='".$oldValue."'", null, $oldData);
        else
            $newData = str_replace($name.'='.$oldValue, null, $oldData);
        if (file_exists($path)) {
            file_put_contents($path, $newData);
        }
    }
}