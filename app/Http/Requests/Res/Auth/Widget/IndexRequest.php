<?php

namespace App\Http\Requests\Res\Auth\Widget;

use App\Abstracts\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'widget';

    /**
     * @var string
     */
    public $actionRef = 'index';
}
