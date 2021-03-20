<?php

namespace App\Abstracts;

abstract class Widget
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    abstract public function compute($request);

    /**
     * @final
     * @return array
     */
    final public function fetch()
    {
        return $this->data;
    }
}
