<?php

namespace App\Http\Requests\Api\System\BranchType;

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
    protected $model = '\App\Models\System\Branch';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'code' => [
                'nullable',
                'max:200',
                Rule::unique('\App\Models\System\BranchType', 'code')
                    ->ignore($this->input('id')),
                new CodeIsChangeableRule($this),
            ],
            'name' => [
                'nullable',
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
