<?php

namespace App\Http\Requests\Ajax\Auth\User;

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
                'required',
                'max:200',
                Rule::unique('\App\Models\Auth\User', $this->input('id')),
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
