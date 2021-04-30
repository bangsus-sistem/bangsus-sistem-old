<?php

namespace App\Http\Requests\Api\Auth\Role;

use App\Foundation\Http\AuthRequest;
use Illuminate\Validation\Rule;

class AmendRequest extends AuthRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'id' => [
                'required',
                'bsb_exists:\App\Models\Auth\Role',
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
            'all_features' => [
                'nullable',
                'boolean',
            ],
            'feature_ids' => [
                'required_with:all_features',
                Rule::requiredIf( ! $this->boolean('all_features')),
                'array',
            ],
            'feature_ids.*' => [
                'required_with:all_features',
                Rule::requiredIf( ! $this->boolean('all_features')),
                'bsb_exists:\App\Models\Auth\Feature',
            ],
            'all_widgets' => [
                'nullable',
                'boolean',
            ],
            'widget_ids' => [
                'required_with:all_widgets',
                Rule::requiredIf( ! $this->boolean('all_widgets')),
                'array',
            ],
            'widget_ids.*' => [
                'required_with:all_widgets',
                Rule::requiredIf( ! $this->boolean('all_widgets')),
                'bsb_exists:\App\Models\Auth\Widget',
            ],
            'all_reports' => [
                'nullable',
                'boolean',
            ],
            'report_ids' => [
                'required_with:all_reports',
                Rule::requiredIf( ! $this->boolean('all_reports')),
                'array',
            ],
            'report_ids.*' => [
                'required_with:all_reports',
                Rule::requiredIf( ! $this->boolean('all_reports')),
                'bsb_exists:\App\Models\Auth\Report',
            ],
        ];
    }
}
