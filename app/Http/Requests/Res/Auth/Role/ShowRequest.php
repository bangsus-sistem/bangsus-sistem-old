<?php

namespace App\Http\Requests\Res\Auth\Role;

use App\Abstracts\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'role';

    /**
     * @var string
     */
    public $actionRef = 'read';
}
