<?php

namespace App\Http\Requests\Res\Hrm\JobTitle;

use App\Foundation\Http\AuthIdRequest;

class ReviseActivationRequest extends AuthIdRequest
{
    /**
     * @var string
     */
    protected $type = 'feature';

    /**
     * @var array
     */
    protected $refs = [
        'module' => 'job_title',
        'action' => 'update',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Hrm\JobTitle';
}
