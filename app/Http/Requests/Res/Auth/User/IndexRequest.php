<?php

namespace App\Http\Requests\Res\Auth\User;

use App\Abstracts\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'user';

    /**
     * @var string
     */
    protected $actionRef = 'index';
}
