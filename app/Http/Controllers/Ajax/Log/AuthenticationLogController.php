<?php

namespace App\Http\Controllers\Ajax\Log;

use App\Http\Controllers\Res\Log\AuthenticationLogController as Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Ajax\Log\AuthenticationLog\{
    StoreLoginRequest,
    StoreAuthenticationTokenRequest,
};
use App\Tasks\Ajax\Log\AuthenticationLog\StoreTask;
use App\Tasks\Ajax\Auth\AuthenticationToken\UseAuthenticationTokenTask;
use App\Services\{
    SanctumLoginService,
    SanctumAuthenticationTokenService,
    SanctumLogoutService,
};
use App\Transformer\RelatedResources\Log\AuthenticationLogRelatedResource;

class AuthenticationLogController extends Controller
{
    /**
     * @param  \App\Http\Requests\Ajax\Log\StoreLoginRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeLogin(StoreLoginRequest $request)
    {
        return response()->json(
            new AuthenticationLogRelatedResource(
                $this->transmit(
                    new StoreTask,
                    $request,
                    $this->manage(new SanctumLoginService, $request)
                )
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Ajax\Log\StoreAuthenticationTokenRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeAuthenticationToken(StoreAuthenticationTokenRequest $request)
    {
        [$user, $authenticationToken] = $this->manage(
            new SanctumAuthenticationTokenService,
            $request
        );
        $this->transmit(new UseAuthenticationTokenTask, $request, $authenticationToken);
        
        return response()->json(
            new AuthenticationLogRelatedResource(
                $this->transmit(
                    new StoreTask,
                    $request,
                    $user
                )
            ),
            200
        );
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeLogout(Request $request)
    {
        return response()->json(
            new AuthenticationLogRelatedResource(
                $this->transmit(
                    new StoreTask,
                    $request,
                    $this->manage(new SanctumLogoutService, $request),
                    false
                )
            ),
            200
        );
    }
}
