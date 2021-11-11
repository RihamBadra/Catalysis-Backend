<?php

namespace App\Http\Middleware;

//use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Illuminate\Http\Request;

class Authenticate
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check()) {
            return $next($request)->header('Access-Control-Allow-Origin','')
                ->header('Access-Control-Allow-Headers','');
        }
        return response()->json([
            'status'=>1000,
            "message"=>'you must be logged in'
        ]);
    }
}
