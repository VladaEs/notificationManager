<?php

namespace App\Http\Controllers;

use App\Mail\NotificationNewMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendNewMessagesNotificationEmail(){
        Mail::to('tookens2005@gmail.com')->send(new NotificationNewMessages());
        return 0;
    }
}
