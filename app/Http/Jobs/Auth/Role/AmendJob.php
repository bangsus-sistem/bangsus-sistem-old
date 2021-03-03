<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Database\Models\Auth\{
    Role,
    RoleFeature,
};

class AmendJob extends Job
{
    /**
     * @param  \App\Http\Requests\Res\Auth\Role\AmendRequest  $request
     * @return \App\Database\Models\Auth\Role
     */
    public function handle($request)
    {
        $role = Role::findOrFail($request->input('id'));
        \DB::transaction(function () use ($request) {
            $role->name = $request->input('name');
            $role->note = $request->input('note');
            $role->save();

            $featureIds = $request->input('feature_ids');
            $role->roleFeatures->whereNotIn('feature_id', $featureIds)
                ->each(function ($roleFeature) {
                    $roleFeature->access = false;
                    $roleFeature->save();
                });

            foreach ($featureIds as $featureId) {
                $roleFeature = $role->roleFeatures
                    ->where([
                        'feature_id' => $featureId,
                    ])
                    ->first();
                
                if (is_null($roleFeature)) {
                    $roleFeature = new RoleFeature;
                    $roleFeature->role_id = $role->id;
                    $roleFeature->feature_id = $featureId;
                } else {
                    if ($roleFeature->access) continue;
                }
                
                $roleFeature->access = true;
                $roleFeature->save();
            }
        });
        return $role;
    }
}
