<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
 public function storeEvent(Request $request){

    $validator = $request->validate([
       "api_key" => ['required', "string" ],
       "event_type" =>['required', 'string', "max:255"],
       "received_at" =>['Sometimes', Rule::date()->format('Y-m-d'),],
       "payload"=>['required']
    ]);

    //check if event exists in DB for this company
    dd($validator);
    



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



