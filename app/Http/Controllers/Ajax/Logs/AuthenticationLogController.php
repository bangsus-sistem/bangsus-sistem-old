<?php

namespace App\Http\Controllers\Ajax\Logs;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Res\Logs\AuthenticationLog\{
    IndexRequest,
    ShowRequest,
    StoreLoginRequest,
    StoreTokenRequest,
    StoreLogoutRequest,
    DestroyRequest,
    RevealTrafficRequest,
    RevealLatestDataRequest,
};
use App\Http\Jobs\Logs\AuthenticationLog\{
    StoreLoginJob,
    StoreTokenJob,
    StoreLogoutJob,
    DestroyJob,
};
use App\Http\Services\Ajax\{
    LoginService,
    TokenService,
    LogoutService,
};
use App\Widgets\Logs\AuthenticationLog\{
    TrafficWidget,
    LatestDataWidget,
};
use App\Database\Models\Logs\AuthenticationLog;
use App\Transformers\SingleCollections\Logs\AuthenticationLogSingleCollection;
use App\Transformers\PaginatedCollections\Logs\AuthenticationLogPaginatedCollection;
use App\Transformers\RelatedResources\Logs\AuthenticationLogRelatedResource;

class AuthenticationLogController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest()
    {
        return response()->json(
            new AuthenticationLogSingleCollection(AuthenticationLog::isNotHidden()->isActive()->all()),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\IndexRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        return response()->json(
            new AuthenticationLogPaginatedCollection(
                AuthenticationLog::where(
                    $this->buildWhere()
                        ->index('code')->mode('string')
                        ->index('name')->mode('string')
                        ->index('active')->mode('boolean')
                        ->index('locked')->mode('boolean')
                        ->index('all_access')->mode('boolean')
                        ->done()
                )
                    ->isNotHidden()
                    ->get()
            ),
            200
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShowRequest $request, int $id)
    {
        return response()->json(
            new AuthenticationLogRelatedResource(AuthenticationLog::isNotHidden()->findOrFail($id)),
            200
        );
    }
    
    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\StoreLoginRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeLogin(StoreLoginRequest $request)
    {
        $user = $this->manage(new LoginService, $request);
        return response()->json(
            new AuthenticationLogRelatedResource(
                $this->dispatch(new StoreLoginJob, $request, $user)
            ),
            201
        );
    }
    
    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\StoreTokenRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeToken(StoreTokenRequest $request)
    {
        $tokenServiceResult = $this->manage(new TokenService, $request);

        return response()->json(
            new AuthenticationLogRelatedResource(
                $this->dispatch(
                    new StoreTokenJob,
                    $request,
                    $tokenServiceResult->user,
                    $tokenServiceResult->authenticationToken,
                )
            ),
            201
        );
    }
    
    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\StoreLogoutRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeLogout(StoreLogoutRequest $request)
    {
        $user = $this->manage(new LogoutService, $request);
        return response()->json(
            new AuthenticationLogRelatedResource(
                $this->dispatch(new StoreLogoutJob, $request, $user)
            ),
            201
        );
    }

    /**
     * @param  \App\Http\Requests\Res\Logs\AuthenticationLog\DestroyRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DestroyRequest $request)
    {
        return response()->json(
            $this->dispatch(new DestroyJob, $request),
            204
        );
    }

    /**
     * @param  \App\Http\Request\Res\Logs\AuthenticationLog\RevealTrafficRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function revealTraffic(RevealTrafficRequest $request)
    {
        return response()
            ->json($this->reveal(new TrafficWidget, $request), 200);
    }

    /**
     * @param  \App\Http\Request\Res\Logs\AuthenticationLog\RevealLatestDataRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function revealLatestData(RevealLatestDataRequest $request)
    {
        return response()
            ->json($this->reveal(new LatestDataWidget, $request), 200);
    }
}
