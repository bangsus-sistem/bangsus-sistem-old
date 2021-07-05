<?php

namespace App\Http\Requests\Res\Master\Unit;

use Waffleboss\Foundation\Http\AuthRequest;

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
        'module' => 'unit',
        'action' => 'read',
    ];
}
