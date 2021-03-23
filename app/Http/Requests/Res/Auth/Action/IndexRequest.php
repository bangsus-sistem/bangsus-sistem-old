<?php

namespace App\Http\Requests\Res\Auth\Action;

use App\Abstracts\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'action';

    /**
     * @var string
     */
    public $actionRef = 'index';
}
