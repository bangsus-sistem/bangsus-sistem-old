<?php

namespace App\Tasks\Ajax\Master\Unit;

use App\Foundation\Task;
use App\Models\Master\Unit;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Ajax\Master\Unit\AmendRequest  $request
     * @return \App\Models\Master\Unit
     */
    public function handle($request)
    {
        $unit = Unit::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $unit) {
                $unit->code = $request->input('code');
                $unit->name = $request->input('name');
                $unit->description = $request->input('description');
                $unit->note = $request->input('note');
                $unit->save();
            }
        );

        return $unit;
    }
}
