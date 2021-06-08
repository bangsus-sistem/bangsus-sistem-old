<?php

namespace App\Tasks\Res\Hrm\Division;

use App\Foundation\Task;
use App\Models\Hrm\Division;

class StoreTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\Division\StoreRequest  $request
     * @return \App\Models\Hrm\Division
     */
    public function handle($request)
    {
        $division = new Division;
        $this->transaction(
            function () use ($request, $division) {
                $division->code = $request->input('code');
                $division->name = $request->input('name');
                $division->active = true;
                $division->description = $request->input('description');
                $division->note = $request->input('note');
                $division->save();
            }
        );

        return $division;
    }
}
