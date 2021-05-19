<?php

namespace App\Tasks\Res\System\Branch;

use App\Foundation\Task;
use App\Models\System\Branch;

class StoreTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\System\Branch\StoreRequest  $request
     * @return \App\Models\System\Branch
     */
    public function handle($request)
    {
        $branch = new Branch;
        $this->transaction(
            function () use ($request, $branch) {
                $branch->code = $request->input('code');
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
