<?php

namespace App\Http\Requests\Res\Master\Unit;

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
        'module' => 'unit',
        'action' => 'update',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Master\Unit';
}
