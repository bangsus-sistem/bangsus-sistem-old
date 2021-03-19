<?php

namespace App\Http\Requests\Res\Auth\Feature;

use App\Abstracts\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'feature';

    /**
     * @var string
     */
    protected $actionRef = 'read';
}
