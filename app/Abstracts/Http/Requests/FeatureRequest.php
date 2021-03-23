<?php

namespace App\Abstracts\Http\Requests;

use App\Abstracts\Http\AuthorizedRequest;

class FeatureRequest extends AuthorizedRequest
{
    /**
     * @var string
     */
    public $permissionType = 'feature';
}
