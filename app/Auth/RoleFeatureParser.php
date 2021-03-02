<?php

namespace App\Auth;

use App\Database\Models\Auth\RoleFeature;

class RoleFeatureParser
{
    /**
     * @var \App\Database\Models\Auth\Role
     */
    protected $role;

    /**
     * @var \App\Database\Models\Auth\Feature
     */
    protected $feature;

    /**
     * @param  \App\Database\Models\Auth\Role  $role
     * @param  \App\Database\Models\Auth\Feature  $feature
     */
    public function __construct($role, $feature)
    {
        $this->role = $role;
        $this->feature = $feature;
    }

    /**
     * @return \App\Database\Models\Auth\RoleFeature
     */
    public function get()
    {
        return RoleFeature::where(
            'role_id',
            $this->role->id
        )
            ->where('feature_id', $this->feature->id)
            ->first();
    }
}
