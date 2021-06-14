<?php

namespace App\Http\Requests\Res\Hrm\BloodType;

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
        'module' => 'blood_type',
        'action' => 'index',
    ];
}
