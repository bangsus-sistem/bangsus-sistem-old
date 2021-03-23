<?php

namespace App\Http\Requests\Res\Auth\Role;

use App\Abstracts\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'role';

    /**
     * @var string
     */
    public $actionRef = 'index';
}
