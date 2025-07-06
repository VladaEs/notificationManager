<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Company;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index() : View{
        
        
        
        
        

        $company_id= 0;
        if(Auth::user()->hasRole('admin')){
            $company_id = 0;
        }
        else{
            $company_id = User::GetUserCompany(Auth::user()->id)->first();
            $company_id = $company_id['company_id']; //getting company id from the eloquent result
        }

        $events= Event::select(['events.*', 'company_events.event_name'])->join('company_events', 'events.event_type_id', '=', 'company_events.id')
        ->orderBy('events.created_at', 'desc')
        ->when($company_id != 0, function($query) use($company_id){
            return $query->where("company_events.company_id", $company_id);
        })->get();
        
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
        return view("dashboard.index", [ "events"=> $eventsContent]);
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


    public function showUsers(){

        $users = User::GetAllUsersCompanies()->get();
        $allCompanies = Company::all();
        //dd($users);
        return view('users.index', ['users'=> $users, "companies"=> $allCompanies]);
    }





    public function readJsonFromFile($disk, $filename){
        $filePath = $disk . "/". $filename;
        $fileContent = json_decode(Storage::disk('s3')->get($filePath));
        return $fileContent;


    }
}
