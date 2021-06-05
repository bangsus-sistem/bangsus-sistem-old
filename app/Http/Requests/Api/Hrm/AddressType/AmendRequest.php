<?php

namespace App\Http\Requests\Api\Hrm\AddressType;

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
        'module' => 'address_type',
        'action' => 'update',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Hrm\AddressType';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'code' => [
                'nullable',
                'max:200',
                Rule::unique('\App\Models\Hrm\AddressType', 'code')
                    ->ignore($this->input('id')),
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
