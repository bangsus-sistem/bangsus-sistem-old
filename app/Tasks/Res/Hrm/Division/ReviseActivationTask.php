<?php

namespace App\Tasks\Res\Hrm\Division;

use App\Foundation\Task;
use App\Models\Hrm\Division;

class ReviseActivationTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\Division\ReviseActivationRequest  $request
     * @param  bool  $state
     * @return \App\Models\Hrm\Division
     */
    public function handle($request, $state = true)
    {
        $division = Division::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $division, $state) {
                $division->active = $state;
                $division->save();
            }
        );

        return $division;
    }
}
