<?php

namespace App\Abstracts\Http;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Abstracts\Widget;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param  \App\Abstracts\Http\Job  $job
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function dispatch(Job $job, $request, ...$args)
    {
        return $job->handle($request, ...$args);
    }

    /**
     * @param  \App\Abstracts\Http\Service  $service
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function manage(Service $service, $request, ...$args)
    {
        return $service->serve($request, ...$args);
    }

    /**
     * @param  \App\Abstracts\Widget  $widget
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function reveal(Widget $widget, $request, ...$args)
    {
        return $widget->fetch($request, ...$args);
    }
}
