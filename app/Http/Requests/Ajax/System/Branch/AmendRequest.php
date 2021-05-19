<?php

namespace App\Http\Requests\Ajax\System\Branch;

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
        'module' => 'branch',
        'action' => 'update',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\System\Branch';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'code' => [
                'required',
                'max:200',
                Rule::unique('\App\Models\System\Branch', $this->input('id')),
            ],
            'name' => [
                'required',
                'max:200',
            ],
            'branch_type_id' => [
                'required',
                'bsb_exists:\App\Models\System\BranchType',
            ],
            'active' => [
                'required',
                'boolean',
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
