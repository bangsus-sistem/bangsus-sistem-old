<?php

namespace App\Tasks\Res\System\BranchType;

use App\Foundation\Task;
use App\Models\System\BranchType;

class ReviseActivationTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\System\BranchType\ReviseActivationRequest  $request
     * @param  bool  $state
     * @return \App\Models\System\BranchType
     */
    public function handle($request, $state = true)
    {
        $branch = BranchType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $branch, $state) {
                $branch->active = $state;
                $branch->save();
            }
        );

        return $branch;
    }
}
