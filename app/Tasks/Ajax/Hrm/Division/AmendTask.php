<?php

namespace App\Tasks\Ajax\Hrm\Division;

use App\Foundation\Task;
use App\Models\Hrm\Division;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Division\AmendRequest  $request
     * @return \App\Models\Hrm\Division
     */
    public function handle($request)
    {
        $division = Division::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $division) {
                $division->code = $request->input('code');
                $division->name = $request->input('name');
                $division->description = $request->input('description');
                $division->note = $request->input('note');
                $division->save();
            }
        );

        return $division;
    }
}
