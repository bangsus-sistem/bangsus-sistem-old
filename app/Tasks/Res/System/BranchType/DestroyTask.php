<?php

namespace App\Tasks\Res\System\BranchType;

use App\Foundation\Task;
use App\Models\System\BranchType;

class DestroyTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\System\BranchType\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $branchType = BranchType::findOrFail($request->input('id'));
        $this->transaction(
            fn () => $branchType->delete()
        );
    }
}
