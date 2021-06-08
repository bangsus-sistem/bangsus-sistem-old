<?php

namespace App\Http\Requests\Res\Hrm\JobTitle;

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
        'module' => 'job_title',
        'action' => 'create',
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'code' => [
                'required',
                'max:200',
                'unique:\App\Models\Hrm\JobTitle',
            ],
            'name' => [
                'required',
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
