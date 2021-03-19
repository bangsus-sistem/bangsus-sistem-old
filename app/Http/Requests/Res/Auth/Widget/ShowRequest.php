<?php

namespace App\Http\Requests\Res\Auth\Widget;

use App\Abstracts\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'widget';

    /**
     * @var string
     */
    protected $actionRef = 'read';
}
