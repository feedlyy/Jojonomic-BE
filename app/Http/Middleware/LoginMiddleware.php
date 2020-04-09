<?php


namespace App\Http\Middleware;

use App\User;
use Closure;

class LoginMiddleware
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
        if ($request['token']) {
            $check = User::query()->where('token', $request['token'])
                ->first();

            if (!$check) {
                return response()->json(['Error' => 'Invalid token'], 422);
            } else {
                return $next($request);
            }
        } else {
            return response()->json(['Error' => 'Please login first'], 401);
        }
    }
}
