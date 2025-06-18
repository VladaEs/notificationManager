<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
class DashboardController extends Controller
{
    public function index() : View{



        $NewMessagesAmount = Event::getNewMessagesAmount(1)->count();
        $comp_id = 1;
        $events= Event::where("company_events.company_id", $comp_id)->join('company_events', 'events.event_type_id', '=', 'company_events.id')
        ->select(['events.*', 'company_events.event_name'])->get();
        $eventsContent = [];
        for($i = 0; $i< $events->count(); $i++ ){
            $eventsContent[$i]['event_type_id'] =$events[$i]["event_type_id"];

            $eventsContent[$i]['read_at'] =$events[$i]["read_at"];
            $eventsContent[$i]['created_at'] =$events[$i]["created_at"];
            $eventsContent[$i]['time_difference'] =Carbon::create($events[$i]["created_at"])->diffForHumans(Carbon::now());
            $eventsContent[$i]['id'] =$events[$i]["id"];
            $eventsContent[$i]['event_name'] = $events[$i]['event_name'];
            // reading data from file:             
            $fileContent = $this->readJsonFromFile($events[$i]['disk'], $events[$i]['file_name']);
            $eventsContent[$i]['messageContent'] = $fileContent;

        }
        return view("dashboard.index", ["NewMessagesAmount"=> $NewMessagesAmount, "events"=> $eventsContent]);
    }

    public function read($id): view{
        //dd($id);

        $event = Event::updateOrCreate(['id'=> $id],['read_at'=> Carbon::now()->timestamp]);

        $NewMessagesAmount = Event::getNewMessagesAmount(1)->count();
        $event= Event::joinTables()->where('events.id', $id)->first();
        $eventPayload = $this->readJsonFromFile($event['disk'], $event["file_name"]);
        //dd($event, $eventPayload);


        return view("dashboard.event", ["NewMessagesAmount"=> $NewMessagesAmount, "eventPayload"=> $eventPayload, "event"=>$event]);
    }





    public function readJsonFromFile($disk, $filename){
        $filePath = $disk . "/". $filename;
        $fileContent = json_decode(Storage::disk('s3')->get($filePath));
        return $fileContent;


    }
}
