<?php

namespace App\Http\Requests\Api\Hrm\BloodType;

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
        'module' => 'blood_type',
        'action' => 'update',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Hrm\BloodType';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'name' => [
                'nullable',
                'max:200',
                Rule::unique('\App\Models\Hrm\BloodType', 'name')
                    ->ignore($this->input('id')),
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
