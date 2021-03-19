<?php

namespace App\Http\Requests\Res\Auth\Module;

use App\Abstracts\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'module';

    /**
     * @var string
     */
    protected $actionRef = 'index';
}
