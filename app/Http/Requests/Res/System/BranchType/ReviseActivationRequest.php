<?php

namespace App\Http\Requests\Res\System\BranchType;

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
        'module' => 'branch',
        'action' => 'update',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\System\BranchType';
}
