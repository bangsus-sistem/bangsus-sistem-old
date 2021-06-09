<?php

namespace App\Tasks\Api\Hrm\Division;

use App\Foundation\Task;
use App\Models\Hrm\Division;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Api\Hrm\Division\AmendRequest  $request
     * @return \App\Models\Hrm\Division
     */
    public function handle($request)
    {
        $division = Division::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $division) {
                $division->code = $request->input('code', $division->code);
                $division->name = $request->input('name', $division->name);
                $division->description = $request->input('description', $division->description);
                $division->note = $request->input('note', $division->note);
                $division->save();
            }
        );

        return $division;
    }
}
