<?php

namespace App\Http\Requests\Res\Auth\Module;

use App\Abstracts\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'module';

    /**
     * @var string
     */
    public $actionRef = 'read';
}
