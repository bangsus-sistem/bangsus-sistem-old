<?php

namespace App\Http\Requests\Res\Hrm\Division;

use App\Foundation\Http\AuthRequest;

class ShowRequest extends AuthRequest
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
        'action' => 'read',
    ];
}
