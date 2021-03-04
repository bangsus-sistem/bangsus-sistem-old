<?php

namespace App\Http\Requests\Res\Auth\User;

use App\Abstracts\Http\AuthorizedRequest;

class IndexRequest extends AuthorizedRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'user';

    /**
     * @var string
     */
    protected $actionRef = 'index';
}
