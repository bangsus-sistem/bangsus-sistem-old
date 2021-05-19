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
     * @var string
     */
    protected $model = '\App\Models\Auth\Role';

    /**
     * @return array
     */
    public function additionalIdRules()
    {
        return [new RoleIsDeletableRule($this)];
    }
}
