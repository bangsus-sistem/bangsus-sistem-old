<?php

namespace App\Abstracts\Validation;

abstract class ExtendedRule
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }
}
