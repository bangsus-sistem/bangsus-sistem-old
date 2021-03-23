<?php

namespace App\Http\Requests\Res\Auth\Package;

use App\Abstracts\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'package';

    /**
     * @var string
     */
    public $actionRef = 'read';
}
