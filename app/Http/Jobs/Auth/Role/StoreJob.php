<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Database\Models\Auth\{
    Role,
    RoleFeature,
};

class StoreJob extends Job
{
    /**
     * @param  \App\Http\Requests\Res\Auth\Role\StoreRequest  $request
     * @return \App\Database\Models\Auth\Role
     */
    public function handle($request)
    {
        $role = new Role;
        \DB::transaction(function () use ($request) {
            $role->code = $request->input('code');
            $role->name = $request->input('name');
            $role->active = true;
            $role->locked = false;
            $role->all_access = false;
            $role->note = $request->input('note');
            $role->save();

            foreach ($request->input('feature_ids') as $featureId) {
                $roleFeature = new RoleFeature;
                $roleFeature->role_id = $role->id;
                $roleFeature->feature_id = $featureId;
                $roleFeature->access = true;
                $roleFeature->save();
            }
        });
        return $role;
    }
}
