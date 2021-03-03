<?php

namespace App\Http\Requests\Res\Auth\Role;

use App\Abstracts\Http\AuthorizedRequest;

class ActivationRequest extends AuthorizedRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'role';

    /**
     * @var string
     */
    protected $actionRef = 'update';

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'id' => [
                'required',
                'bsb_exists:\App\Database\Models\Auth\Role',
            ],
        ];
    }
}
