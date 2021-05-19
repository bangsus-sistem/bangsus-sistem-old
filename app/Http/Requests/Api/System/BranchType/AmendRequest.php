<?php

namespace App\Http\Requests\Api\System\BranchType;

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
                Rule::unique('\App\Models\System\BranchType', $this->input('id')),
            ],
            'name' => [
                'nullable',
                'max:200',
            ],
            'active' => [
                'nullable',
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
