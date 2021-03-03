<?php

namespace App\Http\Requests\Res\Auth\Role;

use App\Abstracts\Http\AuthorizedRequest;
use App\Validation\Auth\Role\RoleIsDeletableRule;

class DestroyRequest extends AuthorizedRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'role';

    /**
     * @var string
     */
    protected $actionRef = 'delete';

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'id' => [
                'required',
                'bsb_exists:\App\Database\Models\Auth\Role',
                new RoleIsDeletableRule($this),
            ],
        ];
    }
}
