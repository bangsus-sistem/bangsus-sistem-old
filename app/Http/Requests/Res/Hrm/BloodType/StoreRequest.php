<?php

namespace App\Http\Requests\Res\Hrm\BloodType;

use App\Foundation\Http\AuthRequest;
use Illuminate\Validation\Rule;

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
        'module' => 'blood_type',
        'action' => 'create',
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'max:200',
                'unique:\App\Models\Hrm\BloodType',
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
