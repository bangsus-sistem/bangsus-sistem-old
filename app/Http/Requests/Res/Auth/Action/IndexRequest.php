<?php

namespace App\Http\Requests\Res\Auth\Action;

use App\Abstracts\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'action';

    /**
     * @var string
     */
    protected $actionRef = 'index';
}
