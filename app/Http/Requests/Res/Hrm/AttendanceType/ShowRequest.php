<?php

namespace App\Http\Requests\Res\Hrm\AttendanceType;

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
        'module' => 'attendance_type',
        'action' => 'read',
    ];
}
