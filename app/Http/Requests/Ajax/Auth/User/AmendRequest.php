<?php

namespace App\Http\Requests\Ajax\Auth\User;

use App\Foundation\Http\AuthIdRequest;
use Illuminate\Validation\Rule;

class AmendRequest extends AuthIdRequest
{
    /**
     * @var string
     */
    protected $type = 'feature';

    /**
     * @var array
     */
    protected $refs = [
        'module' => 'user',
        'action' => 'update',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Auth\User';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'username' => [
                'required',
                'max:200',
                Rule::unique('\App\Models\Auth\User', 'username')->ignore($this->input('id')),
            ],
            'full_name' => [
                'required',
                'max:200',
            ],
            'role_id' => [
                'required',
                'bsb_exists:\App\Models\Auth\Role',
            ],
            'description' => [
                'nullable',
                'max:1000',
            ],
            'note' => [
                'nullable',
                'max:1000',
            ],
            'all_branches' => [
                'required',
                'boolean',
            ],
            'branch_ids' => [
                Rule::requiredIf( ! $this->boolean('all_branches')),
                'array',
            ],
            'branch_ids.*' => [
                Rule::requiredIf( ! $this->boolean('all_branches')),
                'bsb_exists:\App\Models\System\Branch',
            ],
        ];
    }
}
