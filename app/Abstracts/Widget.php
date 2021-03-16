<?php

namespace App\Abstracts;

abstract class Widget
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    abstract public function fetch($request);
}
