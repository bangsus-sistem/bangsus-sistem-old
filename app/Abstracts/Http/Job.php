<?php

namespace App\Abstracts\Http;

abstract class Job
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    abstract public function handle($request);
}
