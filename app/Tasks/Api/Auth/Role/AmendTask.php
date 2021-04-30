<?php

namespace App\Tasks\Api\Auth\Role;

use App\Foundation\Task;
use App\Models\Auth\{
    Role,
    Feature,
    Widget,
    Report,
};

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Api\Auth\Role\AmendRequest  $request
     * @return \App\Models\Auth\Role
     */
    public function handle($request)
    {
        $role = Role::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $role) {
                $role->name = $request->input('name', $role->name);
                $role->active = false;
                $role->all_features = $request->boolean('all_features', $role->all_features);
                $role->all_widgets = $request->boolean('all_widgets', $role->all_widgets);
                $role->all_reports = $request->boolean('all_reports', $role->all_reports);
                $role->description = $request->input('description', $role->description);
                $role->note = $request->input('note', $role->note);
                $role->save();

                if ( ! $role->all_features)
                    $role->features()->sync($request->input('feature_ids'));
                else
                    $role->features()->sync(Feature::get()->pluck('id')->all());

                if ( ! $role->all_widgets)
                    $role->widgets()->sync($request->input('widget_ids'));
                else
                    $role->widgets()->sync(Widget::get()->pluck('id')->all());

                if ( ! $role->all_reports)
                    $role->reports()->sync($request->input('report_ids'));
                else
                    $role->reports()->sync(Report::get()->pluck('id')->all());
            }
        );

        return $role;
    }
}
