<?php

namespace App\Http\Requests\Res\Auth\Feature;

use App\Abstracts\Http\AuthorizedRequest;

class IndexRequest extends AuthorizedRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'feature';

    /**
     * @var string
     */
    protected $actionRef = 'index';
}
