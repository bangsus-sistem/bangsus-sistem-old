<?php

namespace App\Http\Requests\Res\System\BranchType;

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
        'module' => 'branch_type',
        'action' => 'read',
    ];
}
