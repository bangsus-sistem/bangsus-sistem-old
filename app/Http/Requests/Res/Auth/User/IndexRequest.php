<?php

namespace App\Http\Requests\Res\Auth\User;

use App\Abstracts\Http\Requests\FeatureRequest;

class IndexRequest extends FeatureRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'user';

    /**
     * @var string
     */
    public $actionRef = 'index';
}
