<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
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

        $companyId = User::GetUserCompany()->first();
        
        $NewMessagesAmount = Event::getNewMessagesAmount($companyId['company_id'])->count();
        view()->share('messagesAmount',$NewMessagesAmount);
        
    }
}
