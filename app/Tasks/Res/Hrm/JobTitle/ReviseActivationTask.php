<?php

namespace App\Tasks\Res\Hrm\JobTitle;

use App\Foundation\Task;
use App\Models\Hrm\JobTitle;

class ReviseActivationTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\JobTitle\ReviseActivationRequest  $request
     * @param  bool  $state
     * @return \App\Models\Hrm\JobTitle
     */
    public function handle($request, $state = true)
    {
        $jobTitle = JobTitle::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $jobTitle, $state) {
                $jobTitle->active = $state;
                $jobTitle->save();
            }
        );

        return $jobTitle;
    }
}
