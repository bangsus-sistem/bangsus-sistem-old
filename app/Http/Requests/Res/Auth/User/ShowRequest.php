<?php

namespace App\Http\Requests\Res\Auth\User;

use App\Abstracts\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'user';

    /**
     * @var string
     */
    protected $actionRef = 'read';
}
