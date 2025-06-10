<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CompanyController extends Controller
{
    public function createCompany(){
        return view('createCompany');
    }

    public function StoreNewCompany(Request $request){

        $companyName= $request->input('companyName');
        //$isAdmin= !! $request->input('isAdmin');
        
        $validated = $request->validate([
            "companyName"=> ['required', 'string', 'max:255'],
            "isAdmin" => ["accepted", 'sometimes']
        ]);
        $userId = auth()->user()->id;
        $isAdmin=false;
        if(isset($validated['isAdmin'])){
            $isAdmin = true;
        }


        $UUID = Str::uuid()->toString();
        $UUID = str_replace('-', '', $UUID);
        $currentTime=(string) time();
        
        $API_key= md5($UUID .  $currentTime);
        
        
        
        Company::create([
            "edited_by"=> $userId, 
            "name"=> $validated['companyName'],
            "api_key"=> $API_key
        ]);
        


        return redirect()->route('newCompany');
    }

}
