<?php

namespace App\Http\Requests\Res\Auth\Module;

use App\Abstracts\Http\AuthorizedRequest;

class IndexRequest extends AuthorizedRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'module';

    /**
     * @var string
     */
    protected $actionRef = 'read';
}
