<?php

namespace App\Http\Requests\Res\Auth\Action;

use App\Abstracts\Http\AuthorizedRequest;

class ShowRequest extends AuthorizedRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'action';

    /**
     * @var string
     */
    protected $actionRef = 'read';
}
