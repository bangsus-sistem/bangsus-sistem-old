<?php

namespace App\Http\Requests\Res\Auth\Role;

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
        'module' => 'role',
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
                'max:3',
                'unique:roles',
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
            'all_features' => [
                'required',
                'boolean',
            ],
            'feature_ids' => [
                Rule::requiredIf( ! $this->boolean('all_features')),
                'array',
            ],
            'feature_ids.*' => [
                Rule::requiredIf( ! $this->boolean('all_features')),
                'bsb_exists:\App\Models\Auth\Feature',
            ],
            'all_widgets' => [
                'required',
                'boolean',
            ],
            'widget_ids' => [
                Rule::requiredIf( ! $this->boolean('all_widgets')),
                'array',
            ],
            'widget_ids.*' => [
                Rule::requiredIf( ! $this->boolean('all_widgets')),
                'bsb_exists:\App\Models\Auth\Widget',
            ],
            'all_reports' => [
                'required',
                'boolean',
            ],
            'report_ids' => [
                Rule::requiredIf( ! $this->boolean('all_reports')),
                'array',
            ],
            'report_ids.*' => [
                Rule::requiredIf( ! $this->boolean('all_reports')),
                'bsb_exists:\App\Models\Auth\Report',
            ],
        ];
    }
}
