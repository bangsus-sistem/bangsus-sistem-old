<?php

namespace App\Http\Requests\Res\Auth\Package;

use App\Abstracts\Http\Requests\FeatureRequest;

class ShowRequest extends FeatureRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'package';

    /**
     * @var string
     */
    protected $actionRef = 'read';
}
