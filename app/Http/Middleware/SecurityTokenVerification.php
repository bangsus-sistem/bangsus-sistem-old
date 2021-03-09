<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Exceptions\{
    InvalidSecurityTokenException,
    ExpiredSecurityTokenException,
};
use Illuminate\Support\Facades\Auth;

class SecurityTokenVerification
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
        $token = $request->header('Security-Token');
        $apiToken = ApiToken::where('token', $token)->first();

        if (is_null($apiToken)) throw new InvalidSecurityTokenException;

        if ($apiToken->expired_at->lessThan(now()))
            throw new ExpiredSecurityTokenException;

        $user = $apiToken->user;
        Auth::once($user);

        return $next($request);
    }
}
