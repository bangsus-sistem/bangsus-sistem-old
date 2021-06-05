<?php

namespace App\Http\Requests\Ajax\System\BranchType;

use App\Foundation\Http\AuthIdRequest;
use Illuminate\Validation\Rule;
use App\Validation\System\BranchType\CodeIsChangeableRule;

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
        'module' => 'branch_type',
        'action' => 'update',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\System\BranchType';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'code' => [
                'required',
                'max:200',
                Rule::unique('\App\Models\System\BranchType', 'code')
                    ->ignore($this->input('id')),
                new CodeIsChangeableRule($this),
            ],
            'name' => [
                'required',
                'max:200',
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
