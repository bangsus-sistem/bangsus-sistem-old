<?php

namespace App\Tasks\Res\Master\Unit;

use App\Foundation\Task;
use App\Models\Master\Unit;

class ReviseActivationTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Master\Unit\ReviseActivationRequest  $request
     * @param  bool  $state
     * @return \App\Models\Master\Unit
     */
    public function handle($request, $state = true)
    {
        $unit = Unit::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $unit, $state) {
                $unit->active = $state;
                $unit->save();
            }
        );

        return $unit;
    }
}
