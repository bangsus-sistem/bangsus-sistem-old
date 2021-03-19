<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Database\Models\Auth\{
    Role,
    RoleFeature,
    RoleWidget,
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

            // Handle the features.
            $featureIds = $request->input('feature_ids');
            $role->roleFeatures->whereNotIn('feature_id', $featureIds)
                ->each(function ($roleFeature) {
                    $roleFeature->access = false;
                    $roleFeature->save();
                });

            foreach ($featureIds as $featureId) {
                $roleFeature = $role->roleFeatures
                    ->where('feature_id', $featureId)
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

            // Handle the widgets.
            $widgetIds = $request->input('widget_ids');
            $role->roleWidgets->whereNotIn('widget_id', $widgetIds)
                ->each(function ($roleWidget) {
                    $roleWidget->access = false;
                    $roleWidget->save();
                });

            foreach ($widgetIds as $widgetId) {
                $roleWidget = $role->roleWidgets
                    ->where('widget_id', $widgetId)
                    ->first();
                
                if (is_null($roleWidget)) {
                    $roleWidget = new RoleWidget;
                    $roleWidget->role_id = $role->id;
                    $roleWidget->widget_id = $widgetId;
                } else {
                    if ($roleWidget->access) continue;
                }
                
                $roleWidget->access = true;
                $roleWidget->save();
            }
        });
        return $role;
    }
}
