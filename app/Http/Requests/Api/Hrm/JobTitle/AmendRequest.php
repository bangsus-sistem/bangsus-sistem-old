<?php

namespace App\Http\Requests\Api\Hrm\JobTitle;

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
        'module' => 'job_title',
        'action' => 'update',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Hrm\JobTitle';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'code' => [
                'nullable',
                'max:200',
                Rule::unique('\App\Models\Hrm\JobTitle', 'code')
                    ->ignore($this->input('id')),
            ],
            'name' => [
                'nullable',
                'max:200',
            ],
            'division_id' => [
                'required',
                'bsb_exists:\App\Models\Hrm\Division',
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
