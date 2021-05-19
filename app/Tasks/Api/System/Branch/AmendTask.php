<?php

namespace App\Tasks\Api\System\Branch;

use App\Foundation\Task;
use App\Models\System\Branch;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Api\System\Branch\AmendRequest  $request
     * @return \App\Models\System\Branch
     */
    public function handle($request)
    {
        $branch = Branch::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $branch) {
                $branch->name = $request->input('name', $branch->name);
                $branch->branch_type_id = $request->input('branch_type_id', $branch->branch_type_id);
                $branch->active = $request->boolean('active', $branch->active);
                $branch->description = $request->input('description', $branch->description);
                $branch->note = $request->input('note', $branch->note);
                $branch->save();
            }
        );

        return $branch;
    }
}
