<?php

namespace App\Tasks\Res\Hrm\JobTitle;

use App\Foundation\Task;
use App\Models\Hrm\JobTitle;

class DestroyTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\JobTitle\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $jobTitle = JobTitle::findOrFail($request->input('id'));
        $this->transaction(
            fn () => $jobTitle->delete()
        );
    }
}
