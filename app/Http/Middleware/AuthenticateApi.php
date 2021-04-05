<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use App\Models\Auth\{
    BearerToken,
    ApiToken,
};
use Carbon\Carbon;

class AuthenticateApi
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
        $bearerToken = $request->header('Authentication-Bearer');
        $apiToken = $request->header('Authentication-Token');

        $bearerToken = BearerToken::where('token', $bearerToken)->first();
        if (is_null($bearerToken)) throw new AuthenticationException;
        if (Carbon::now()->greaterThan(new Carbon($bearerToken->expired_at)))
            throw new AuthenticationException;

        $apiToken = $bearerToken->apiTokens()->where('token', $apiToken)
            ->first();
        if (is_null($apiToken)) throw new AuthenticationException;
        if (Carbon::now()->greaterThan(new Carbon($apiToken->expired_at)))
            throw new AuthenticationException;
        
        return $next($request);
    }
}
