<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdminArtisanController extends Controller
{
    private $serect_code = 'LMN159753.';

    private function Check(Request $request){
        $code = $request->code;
        if($code !== $this->serect_code){
            return abort(404);
        }
    }
    public function index(Request $request){
        $this->Check($request);
        $arr = [
            'link' => 'storage:link',
            'migrate' => 'migrate',
        ];
        echo '<table>';
        foreach($arr as $key => $value){
            echo '<tr>';
                echo '<td>';
                    echo $key.' | ';
                echo '</td>';
                echo '<td>';
                    echo $value;
                echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
            
    public function link(Request $request){
        $this->Check($request);
        Artisan::call('storage:link');
    }

    public function migrate(Request $request){
        $this->Check($request);
        Artisan::call('migrate');
    }

    // public function start_seeder(Request $request){
    //     $this->Check($request);
    //     Artisan::call('db:seed --class=StartSeeder');
    // }
}
