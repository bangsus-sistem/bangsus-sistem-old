<?php

namespace App\Http\Requests\Ajax\Auth\Role;

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
        'module' => 'role',
        'action' => 'update',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Auth\Role';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
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
