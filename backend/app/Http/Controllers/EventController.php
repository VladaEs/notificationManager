<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\models\Company;
use App\Models\CompanyEvent;
use App\Models\Event;
use Illuminate\Support\Str;



class EventController extends Controller
{
 public function storeEvent(Request $request){
    $validator = $request->validate([
       "api_key" => ['required', "string" ],
       "event_type" =>['required', 'string', "max:255"],
       "received_at" =>['Sometimes', Rule::date()->format('Y-m-d'),],
       "payload"=>['required']
    ]);
    
    $company = Company::where('api_key',$validator['api_key'] )->first();
    $events = CompanyEvent::where('company_id', $company["id"])->where('event_name', $validator['event_type'])->first();
    
    if($events == null){ // if event does not exist
        $events = CompanyEvent::create([
            'company_id'=> $company['id'],
            "event_name"=> $validator["event_type"],
        ]);
    }
    
    
    
    $uuid = Str::uuid()->toString();
    $fileName= $company['id']. '_'. $uuid . '_' . time(). '.json';
    $disk= 'events';
    $filePath = $disk."/" . $fileName;
    $file = Storage::disk('s3')->put($filePath, json_encode($validator['payload'])); // save file as private not public
    
    if($file){ //save data to DB if file was uploaded

        
        $newEvent = Event::create([
            'event_type_id'=> $events['id'],
            'company_id' => $company['id'],
            "file_name"=> $fileName,
            "disk"=> $disk,

        ]);
    }
    else{
        return response()->json([
            'status'=> 'failed',
            'message'=> 'failed during file upload'
        ],500);
    }




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



