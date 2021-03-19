<?php

namespace App\Http\Requests\Res\Auth\Widget;

use App\Abstracts\Http\AuthorizedRequest;

class IndexRequest extends AuthorizedRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'widget';

    /**
     * @var string
     */
    protected $actionRef = 'index';
}
