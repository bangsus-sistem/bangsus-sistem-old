<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Database\Models\Auth\Role;

class DestroyJob extends Job
{
    /**
     * @param  \App\Http\Requests\Res\Auth\Role\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $role = Role::findOrFail($request->input('id'));
        $role->delete();
    }
}
