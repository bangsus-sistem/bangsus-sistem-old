<?php

namespace App\Http\Requests\Res\Auth\User;

use App\Abstracts\Http\AuthorizedRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends AuthorizedRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'user';

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
            'username' => [
                'required',
                'min:6',
                'unique:App\Database\Models\Auth\User',
            ],
            'password' => [
                'required',
                'min:6',
            ],
            'password_confirmation' => [
                'required_with:password',
                'same:password',
            ],
            'full_name' => [
                'required',
                'max:400',
            ],
            'role_id' => [
                'required',
                'bsb_exists:\App\Database\Models\Auth\Role',
            ],
            'all_branch_type_access' => [
                'required',
                'boolean',
            ],
            'all_branch_access' => [
                'required',
                'boolean',
            ],
            'branch_type_ids' => [
                Rule::requiredIf( ! $this->boolean('all_branch_type_access')),
                'array',
                'min:1',
            ],
            'branch_type_ids.*' => [
                Rule::requiredIf( ! $this->boolean('all_branch_type_access')),
                'bsb_exists:\App\Database\Models\System\BranchType',
            ],
            'branch_ids' => [
                Rule::requiredIf( ! $this->boolean('all_branch_access')),
                'array',
                'min:1',
            ],
            'branch_ids.*' => [
                Rule::requiredIf( ! $this->boolean('all_branch_access')),
                'bsb_exists:\App\Database\Models\System\Branch',
            ],
            'note' => [
                'nullable',
                'max:1000',
            ],
        ];
    }
}
