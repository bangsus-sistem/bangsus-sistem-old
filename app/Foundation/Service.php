<?php

namespace App\Foundation;

abstract class Service
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    abstract public function serve($request);
}
