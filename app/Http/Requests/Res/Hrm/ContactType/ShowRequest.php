<?php

namespace App\Http\Requests\Res\Hrm\ContactType;

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
        'module' => 'contact_type',
        'action' => 'read',
    ];
}
