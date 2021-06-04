<?php

namespace App\Http\Requests\Api\Master\Unit;

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
        'module' => 'unit',
        'action' => 'update',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Master\Unit';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'code' => [
                'nullable',
                'max:200',
                Rule::unique('\App\Models\Master\Unit', 'code')->ignore($this->input('id')),
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
