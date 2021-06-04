<?php

namespace App\Tasks\Res\System\BranchType;

use App\Foundation\Task;
use App\Models\System\BranchType;

class StoreTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\System\BranchType\StoreRequest  $request
     * @return \App\Models\System\BranchType
     */
    public function handle($request)
    {
        $branchType = new BranchType;
        $this->transaction(
            function () use ($request, $branchType) {
                $branchType->code = $request->input('code');
                $branchType->name = $request->input('name');
                $branchType->active = true;
                $branchType->description = $request->input('description');
                $branchType->note = $request->input('note');
                $branchType->save();
            }
        );

        return $branchType;
    }
}
