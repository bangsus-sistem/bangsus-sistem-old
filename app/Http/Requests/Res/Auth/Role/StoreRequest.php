<?php

namespace App\Http\Requests\Res\Auth\Role;

use App\Abstracts\Http\AuthorizedRequest;

class StoreRequest extends AuthorizedRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'role';

    /**
     * @var string
     */
    protected $actionRef = 'create';

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'code' => [
                'required',
                'max:3',
                'unique:App\Database\Models\Auth\Role',
            ],
            'name' => [
                'required',
                'max:200',
            ],
            'feature_ids' => [
                'required',
                'array',
                'min:1',
            ],
            'feature_ids.*' => [
                'required',
                'bsb_exists:\App\Database\Models\Auth\Feature',
            ],
            'note' => [
                'nullable',
                'max:1000',
            ],
        ];
    }
}
