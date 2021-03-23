<?php

namespace App\Http\Requests\Res\Auth\Role;

use App\Abstracts\Http\Requests\FeatureRequest;
use App\Validation\Auth\Role\RoleIsDeletableRule;

class DestroyRequest extends FeatureRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'role';

    /**
     * @var string
     */
    public $actionRef = 'delete';

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
