<?php

namespace App\Tasks\Ajax\System\BranchType;

use App\Foundation\Task;
use App\Models\System\BranchType;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Ajax\System\BranchType\AmendRequest  $request
     * @return \App\Models\System\BranchType
     */
    public function handle($request)
    {
        $branchType = BranchType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $branchType) {
                $branchType->name = $request->input('name');
                $branchType->active = $request->boolean('active');
                $branchType->description = $request->input('description');
                $branchType->note = $request->input('note');
                $branchType->save();
            }
        );

        return $branchType;
    }
}
