<?php

namespace App\Abstracts\Http\Requests;

use App\Abstracts\Http\AuthorizedRequest;

class WidgetRequest extends AuthorizedRequest
{
    /**
     * @var string
     */
    public $permissionType = 'widget';
}
