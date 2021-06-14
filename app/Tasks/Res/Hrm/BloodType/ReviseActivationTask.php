<?php

namespace App\Tasks\Res\Hrm\BloodType;

use App\Foundation\Task;
use App\Models\Hrm\BloodType;

class ReviseActivationTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\BloodType\ReviseActivationRequest  $request
     * @param  bool  $state
     * @return \App\Models\Hrm\BloodType
     */
    public function handle($request, $state = true)
    {
        $bloodType = BloodType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $bloodType, $state) {
                $bloodType->active = $state;
                $bloodType->save();
            }
        );

        return $bloodType;
    }
}
