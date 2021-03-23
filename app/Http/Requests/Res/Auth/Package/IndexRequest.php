<?php

namespace App\Http\Requests\Res\Auth\Package;

use App\Abstracts\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'package';

    /**
     * @var string
     */
    public $actionRef = 'index';
}
