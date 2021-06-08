<?php

namespace App\Tasks\Api\Hrm\JobTitle;

use App\Foundation\Task;
use App\Models\Hrm\JobTitle;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Api\Hrm\JobTitle\AmendRequest  $request
     * @return \App\Models\Hrm\JobTitle
     */
    public function handle($request)
    {
        $jobTitle = JobTitle::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $jobTitle) {
                $jobTitle->code = $request->input('code', $jobTitle->code);
                $jobTitle->name = $request->input('name', $jobTitle->name);
                $jobTitle->division_id = $request->input('division_id', $jobTitle->division_id);
                $jobTitle->description = $request->input('description', $jobTitle->description);
                $jobTitle->note = $request->input('note', $jobTitle->note);
                $jobTitle->save();
            }
        );

        return $jobTitle;
    }
}
