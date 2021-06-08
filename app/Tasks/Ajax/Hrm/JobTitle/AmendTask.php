<?php

namespace App\Tasks\Ajax\Hrm\JobTitle;

use App\Foundation\Task;
use App\Models\Hrm\JobTitle;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Ajax\Hrm\JobTitle\AmendRequest  $request
     * @return \App\Models\Hrm\JobTitle
     */
    public function handle($request)
    {
        $jobTitle = JobTitle::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $jobTitle) {
                $jobTitle->code = $request->input('code');
                $jobTitle->name = $request->input('name');
                $jobTitle->division_id = $request->input('division_id');
                $jobTitle->description = $request->input('description');
                $jobTitle->note = $request->input('note');
                $jobTitle->save();
            }
        );

        return $jobTitle;
    }
}
