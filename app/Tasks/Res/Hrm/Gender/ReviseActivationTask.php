<?php

namespace App\Tasks\Res\Hrm\Gender;

use App\Foundation\Task;
use App\Models\Hrm\Gender;

class ReviseActivationTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\Gender\ReviseActivationRequest  $request
     * @param  bool  $state
     * @return \App\Models\Hrm\Gender
     */
    public function handle($request, $state = true)
    {
        $gender = Gender::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $gender, $state) {
                $gender->active = $state;
                $gender->save();
            }
        );

        return $gender;
    }
}
