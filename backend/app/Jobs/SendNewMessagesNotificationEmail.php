<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationNewMessages;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewMessagesNotificationEmail implements ShouldQueue
{
    use Queueable;
    public $email='';
    public int $messagesCount = 0; 
    /**
     * Create a new job instance.
     */
    public function __construct($email, $messagesCount){
        //

        $this->email = $email;
        $this->messagesCount = $messagesCount;
    }

    /**
     * Execute the job.
     */
    public function handle(): void{
        Log::info('Sending mail to: ' . $this->email);
    Log::info('Messages count: ' . $this->messagesCount);
        Mail::to($this->email)->send(new NotificationNewMessages($this->messagesCount));
    }
}
