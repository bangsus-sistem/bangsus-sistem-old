<?php

namespace App\Http\Requests\Res\Auth\Role;

use App\Abstracts\Http\AuthorizedRequest;

class AmendRequest extends AuthorizedRequest
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
            'code' => [
                'required',
                'max:3',
                'unique:App\Database\Models\Auth\Role',
            ],
            'name' => [
                'required',
                'max:200',
            ],
            'note' => [
                'nullable',
                'max:1000',
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
            'widget_ids' => [
                'required',
                'array',
            ],
            'widget_ids.*' => [
                'required',
                'bsb_exists:\App\Database\Models\Auth\Widget',
            ],
        ];
    }
}
