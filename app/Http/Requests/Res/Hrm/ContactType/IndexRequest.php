<?php

namespace App\Http\Requests\Res\Hrm\ContactType;

use App\Foundation\Http\AuthRequest;

class IndexRequest extends AuthRequest
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
        'action' => 'index',
    ];
}
