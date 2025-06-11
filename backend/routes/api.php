<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::post('/newevent', [Eventcontroller::class, 'storeEvent'])->name('storeEvent');





// {
//     "api_key":"your API Key"
//     "event_type": "new message",
//     "received_at": "2025-06-08",
//     "payload": {
//         "user_id": 123,
//         "email": "john@example.com",
//         "registered_at": "2025-06-08T15:21:00Z"
//     }
// }