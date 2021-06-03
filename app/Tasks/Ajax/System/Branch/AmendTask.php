<?php

namespace App\Tasks\Ajax\System\Branch;

use App\Foundation\Task;
use App\Models\System\{
    Branch,
    BranchType,
};

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Ajax\System\Branch\AmendRequest  $request
     * @return \App\Models\System\Branch
     */
    public function handle($request)
    {
        $branch = Branch::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $branch) {
                $branchType = BranchType::find($request->input('branch_type_id'));
                $branch->code = $branchType->code . $request->input('code');
                $branch->name = $request->input('name');
                $branch->branch_type_id = $request->input('branch_type_id');
                $branch->active = $request->boolean('active');
                $branch->description = $request->input('description');
                $branch->note = $request->input('note');
                $branch->save();
            }
        );

        return $branch;
    }
}
