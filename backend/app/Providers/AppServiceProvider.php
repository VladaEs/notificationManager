<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $NewMessagesAmount= 0;

            if(Auth::user()){
                $companyId = User::GetUserCompany(Auth::user()->id)->first();    
                
                if($companyId){
                    $NewMessagesAmount = Event::getNewMessagesAmount($companyId['company_id'])->count();
                    
                }
            }
            $view->with('messagesAmount', $NewMessagesAmount);
        });
    }
}
