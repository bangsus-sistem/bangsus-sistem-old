<?php

namespace App\Http\Requests\Res\Auth\Role;

use App\Foundation\Http\AuthRequest;
use App\Validation\Auth\Role\RoleIsDeletableRule;

class DestroyRequest extends AuthRequest
{
    /**
     * @var string
     */
    protected $type = 'feature';

    /**
     * @var array
     */
    protected $refs = [
        'module' => 'role',
        'action' => 'delete',
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'id' => [
                'required',
                'bsb_exists:\App\Models\Auth\Role',
                new RoleIsDeletableRule($this),
            ],
        ];
    }
}
