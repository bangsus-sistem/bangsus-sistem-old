<?php

namespace App\Http\Requests\Res\Auth\Module;

use App\Abstracts\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'module';

    /**
     * @var string
     */
    public $actionRef = 'index';
}
