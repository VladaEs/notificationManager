<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Company;
class checkApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $apiKey = $request->input('api_key');
        $companyExists= Company::where('api_key',$apiKey )->exists();
        if(!$companyExists){
            return response()->json(['error'=> "Invalid API key"]);
        }
        return $next($request);
    }
}
