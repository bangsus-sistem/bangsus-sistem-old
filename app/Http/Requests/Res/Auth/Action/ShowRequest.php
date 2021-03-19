<?php

namespace App\Http\Requests\Res\Auth\Action;

use App\Abstracts\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
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
