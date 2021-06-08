<?php

namespace App\Http\Requests\Res\Hrm\Division;

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
        'module' => 'division',
        'action' => 'update',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Hrm\Division';
}
