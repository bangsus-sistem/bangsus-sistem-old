<?php

namespace App\Tasks\Api\System\BranchType;

use App\Foundation\Task;
use App\Models\System\BranchType;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Api\System\BranchType\AmendRequest  $request
     * @return \App\Models\System\BranchType
     */
    public function handle($request)
    {
        $branchType = BranchType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $branchType) {
                $branchType->code = $request->input('code', $branchType->code);
                $branchType->name = $request->input('name', $branchType->name);
                $branchType->active = $request->boolean('active', $branchType->active);
                $branchType->description = $request->input('description', $branchType->description);
                $branchType->note = $request->input('note', $branchType->note);
                $branchType->save();
            }
        );

        return $branchType;
    }
}
