<?php

namespace App\Http\Requests\Api\System\Branch;

use App\Foundation\Http\AuthIdRequest;
use Illuminate\Validation\Rule;
use App\Validation\System\Branch\CodeIsUniqueIgnoreRule;

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
                'nullable',
                'max:200',
                new CodeIsUniqueIgnoreRule($this),
            ],
            'name' => [
                'nullable',
                'max:200',
            ],
            'branch_type_id' => [
                'nullable',
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
