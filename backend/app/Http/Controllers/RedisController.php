<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
class RedisController extends Controller
{
    public function index(){
        Redis::set("user:1:first_name" , "Mike");
        Redis::set("user:2:first_name" , "Tom");
        Redis::set("user:3:first_name" , "Jane");
        for($i = 0; $i<3; $i++){
            echo Redis::get('user:'. $i+1 . ':first_name');
        }
    }
}
