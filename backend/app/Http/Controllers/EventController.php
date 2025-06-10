<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function storeEvent(Request $event){
        session(['request'=> $event->all()]);
        
        return 1;

    }
}
