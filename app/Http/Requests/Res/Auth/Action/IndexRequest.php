<?php

namespace App\Http\Requests\Res\Auth\Action;

use App\Abstracts\Http\AuthorizedRequest;

class IndexRequest extends AuthorizedRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'action';

    /**
     * @var string
     */
    protected $actionRef = 'index';
}
