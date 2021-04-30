<?php

namespace App\Tasks\Res\Auth\Role;

use App\Foundation\Task;
use App\Models\Auth\{
    Role,
    Feature,
    Widget,
    Report,
};

class StoreTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Auth\Role\StoreRequest  $request
     * @return \App\Models\Auth\Role
     */
    public function handle($request)
    {
        $role = new Role;
        $this->transaction(
            function () use ($request, $role) {
                $role->code = $request->input('code');
                $role->name = $request->input('name');
                $role->active = false;
                $role->all_features = $request->boolean('all_features');
                $role->all_widgets = $request->boolean('all_widgets');
                $role->all_reports = $request->boolean('all_reports');
                $role->description = $request->input('description');
                $role->note = $request->input('note');
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
