<?php

namespace App\Http\Requests\Res\Auth\Feature;

use App\Abstracts\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'feature';

    /**
     * @var string
     */
    public $actionRef = 'index';
}
