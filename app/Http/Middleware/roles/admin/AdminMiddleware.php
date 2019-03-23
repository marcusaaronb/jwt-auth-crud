<?php

namespace App\Http\Middleware\roles\admin;

use App\Enums\UserType;
use Closure;
use Illuminate\Http\Response;

class AdminMiddleware
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
        if ($request->user() && $request->user()->role_id != UserType::Admin) {
            return response()->json(['message' => 'unauthorized'], 401);
        }

        return $next($request);
    }
}
