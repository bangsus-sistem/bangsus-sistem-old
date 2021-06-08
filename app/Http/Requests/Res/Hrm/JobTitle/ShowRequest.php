<?php

namespace App\Http\Requests\Res\Hrm\JobTitle;

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
        'module' => 'job_title',
        'action' => 'read',
    ];
}
