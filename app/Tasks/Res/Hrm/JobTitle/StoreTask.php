<?php

namespace App\Tasks\Res\Hrm\JobTitle;

use App\Foundation\Task;
use App\Models\Hrm\JobTitle;

class StoreTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\JobTitle\StoreRequest  $request
     * @return \App\Models\Hrm\JobTitle
     */
    public function handle($request)
    {
        $jobTitle = new JobTitle;
        $this->transaction(
            function () use ($request, $jobTitle) {
                $jobTitle->code = $request->input('code');
                $jobTitle->name = $request->input('name');
                $jobTitle->division_id = $request->input('division_id');
                $jobTitle->active = true;
                $jobTitle->description = $request->input('description');
                $jobTitle->note = $request->input('note');
                $jobTitle->save();
            }
        );

        return $jobTitle;
    }
}
