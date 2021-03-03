<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Database\Models\Auth\Role;

class ActivationJob extends Job
{
    /**
     * @param  \App\Http\Requests\Res\Auth\Role\ActivationRequest  $request
     * @param  bool  $active
     * @return \App\Database\Models\Auth\Role
     */
    public function handle($request, bool $active = true)
    {
        $role = Role::findOrFail($request->input('id'));
        $role->active = $active;
        $role->save();
        return $role;
    }
}
