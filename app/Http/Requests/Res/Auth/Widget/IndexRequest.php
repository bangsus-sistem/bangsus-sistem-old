<?php

namespace App\Http\Requests\Res\Auth\Widget;

use App\Abstracts\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'widget';

    /**
     * @var string
     */
    protected $actionRef = 'index';
}
