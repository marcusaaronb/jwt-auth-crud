<?php

namespace App\Http\Middleware\roles\master;

use App\Enums\UserType;
use Closure;
use Illuminate\Http\Response;

class MasterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->role_id != UserType::Master) {
            return response()->json(['message' => 'unauthorized'], 401);
        }

        return $next($request);
    }
}
