<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProductControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->header("key") != "asdffdsa"){
            return response()->json([
                "message" => "Ma Pay Buu Kwar!!!"
            ], 403);
        }
        return $next($request);
    }
}
