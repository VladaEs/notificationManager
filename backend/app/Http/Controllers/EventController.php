<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
class EventController extends Controller
{
 public function storeEvent(Request $request){
    // Можно сохранить в сессию для проверки
    
    session()->put('request', 111);
    

    // Возвращаем JSON
    return response()->json([
        'status' => 'success',
        'message' => 'Event received',
    ], 200);
}


    public function showEvent(){
        
        $req= session()->get('request');
        
        dd($req);
    }
}



