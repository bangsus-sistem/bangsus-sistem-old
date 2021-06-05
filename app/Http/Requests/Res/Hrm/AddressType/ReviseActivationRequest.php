<?php

namespace App\Http\Requests\Res\Hrm\AddressType;

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
        'module' => 'address_type',
        'action' => 'update',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Hrm\AddressType';
}
