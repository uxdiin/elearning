<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use App\User;
use Closure;
use Illuminate\Support\Facades\DB;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!empty(trim($request->get('Authorization')))){
            $api_token = User::where('api_token',$request->get('Authorization'))->get();
            if(!empty($api_token)){
                return $next($request);
            }
            else{
                return response()->json("ga ada");
            }
        }
        return response()->json($request);
    }
}
