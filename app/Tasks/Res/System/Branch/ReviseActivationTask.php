<?php

namespace App\Tasks\Res\System\Branch;

use App\Foundation\Task;
use App\Models\System\Branch;

class ReviseActivationTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\System\Branch\ReviseActivationRequest  $request
     * @param  bool  $state
     * @return \App\Models\System\Branch
     */
    public function handle($request, $state = true)
    {
        $branch = Branch::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $branch, $state) {
                $branch->active = $state;
                $branch->save();
            }
        );

        return $branch;
    }
}
