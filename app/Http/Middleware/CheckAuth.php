<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Date;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        $user = User::where('api_token', $token)
            ->where('api_token_generated_at', '>=', Date::now()->add('-15minutes')->format('Y-m-d H:i:s'))
            ->first();
        if (!$user) {
            $response = response([
                    'errors' => ['Authorized' => ['Not authorized']],
            ], 401);
            throw new HttpResponseException($response);
        }
        return $next($request);
    }
}
