<?php

namespace App\Http\Requests\Res\Auth\Package;

use App\Abstracts\Http\AuthorizedRequest;

class IndexRequest extends AuthorizedRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'package';

    /**
     * @var string
     */
    protected $actionRef = 'index';
}
