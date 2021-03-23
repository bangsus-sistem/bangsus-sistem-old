<?php

namespace App\Http\Requests\Res\Auth\User;

use App\Abstracts\Http\Requests\FeatureRequest;
use Illuminate\Validation\Rule;

class AmendRequest extends FeatureRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'user';

    /**
     * @var string
     */
    public $actionRef = 'update';

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'id' => [
                'required',
                'bsb_exists:\App\Database\Models\Auth\User',
            ],
            'username' => [
                'required',
                'min:6',
                'unique:App\Database\Models\Auth\User',
            ],
            'full_name' => [
                'required',
                'max:400',
            ],
            'role_id' => [
                'required',
                'bsb_exists:\App\Database\Models\Auth\Role',
            ],
            'all_branch_access' => [
                'required',
                'boolean',
            ],
            'branch_type_ids' => [
                'nullable',
                'array',
                'min:1',
            ],
            'branch_type_ids.*' => [
                'bsb_exists:\App\Database\Models\System\BranchType',
            ],
            'branch_ids' => [
                Rule::requiredIf( ! $this->boolean('all_branch_access')),
                'array',
                'min:1',
            ],
            'branch_ids.*' => [
                'bsb_exists:\App\Database\Models\System\Branch',
            ],
            'note' => [
                'nullable',
                'max:1000',
            ],
        ];
    }
}
