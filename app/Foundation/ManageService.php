<?php

namespace App\Foundation;

trait ManageService
{
    /**
     * @param  \App\Foundation\Service  $service
     * @param  \Illuminate\Http\Request  $request
     * @param  ...$args
     * @return void
     */
    public function manage(Service $service, $request, ...$args)
    {
        return $service->serve($request, ...$args);
    }
}
