<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Company;
use App\Models\CompanyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationNewMessages;
use App\Jobs\SendNewMessagesNotificationEmail;

class MailController extends Controller
{
    public function sendNewMessagesNotificationEmail(Request $request){

        $request->validate([
            "companyName"=>['required', 'integer'],
        ]);

        $companyUsers =[]; // variable for storing all the users from the company
        $companies=[];
        if($request['companyName']== 0){ // if admin selected send notifications to all the companies not to one specific
            //$companyUsers= Company::GetCompanyUsers(0)->get();
            $companies = DB::table('events')->select('company_id', DB::raw('COUNT(*) as unread_count'))
            ->whereNull('read_at')->groupBy('company_id')->get();


            // SELECT `company_id`, COUNT(*) AS events_count
            // FROM `events`
            // WHERE `read_at` IS NULL
            // GROUP BY `company_id`;
        }
        else{
            //$companyUsers= Company::GetCompanyUsers($request['companyName'])->get();
            $companies = DB::table('events')->select('company_id', DB::raw('COUNT(*) as unread_count'))
            ->whereNull('read_at')->where("company_id", $request['companyName'])->groupBy('company_id')->get();
        }
        
        foreach($companies as $company){
            //dd($company);
            $users = CompanyUser::GetUserInfo()->where('company_id', $company->company_id)->get();
            
            foreach($users as $user){
                Log::info('Dispatching email to: ' . $user['email']);
                dispatch(new SendNewMessagesNotificationEmail($user->email, $company->unread_count));
            }
        }
        

        //loop to join users and companies in array which will look like ["company_id1" => [email1, email2, email3...]]

        
            

            $NewMessagesAmount = Event::getNewMessagesAmount(1)->count();
        
        


        //Mail::to('tookens2005@gmail.com')->send(new NotificationNewMessages());
        return redirect()->back();
    }
}
//Need to finish email notification( need to select company then users and then the ampunt of unread messages)

