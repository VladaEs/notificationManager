<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $messagesAmount = 100;
        
        return view("dashboard.index", ["messagesAmount"=> $messagesAmount]);
    }
}
