<?php

namespace App\Http\Requests\Api\Auth\User;

use App\Foundation\Http\AuthRequest;
use Illuminate\Validation\Rule;

class AmendRequest extends AuthRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'id' => [
                'required',
                'bsb_exists:\App\Models\Auth\User',
            ],
            'username' => [
                'nullable',
                'max:200',
                Rule::unique('\App\Models\Auth\User', $this->input('id')),
            ],
            'full_name' => [
                'nullable',
                'max:200',
            ],
            'role_id' => [
                'nullable',
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
                'nullable',
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
