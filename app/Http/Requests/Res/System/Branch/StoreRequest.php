<?php

namespace App\Http\Requests\Res\System\Branch;

use App\Foundation\Http\AuthRequest;
use Illuminate\Validation\Rule;
use App\Validation\System\Branch\CodeIsUniqueRule;

class StoreRequest extends AuthRequest
{
    /**
     * @var string
     */
    protected $type = 'feature';

    /**
     * @var array
     */
    protected $refs = [
        'module' => 'branch',
        'action' => 'create',
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'code' => [
                'required',
                'max:200',
                new CodeIsUniqueRule($this),
            ],
            'name' => [
                'required',
                'max:200',
            ],
            'branch_type_id' => [
                'required',
                'bsb_exists:\App\Models\System\BranchType',
            ],
            'description' => [
                'nullable',
                'max:1000',
            ],
            'note' => [
                'nullable',
                'max:1000',
            ],
        ];
    }
}
