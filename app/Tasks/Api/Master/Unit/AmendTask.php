<?php

namespace App\Tasks\Api\Master\Unit;

use Waffleboss\Foundation\Task;
use App\Models\Master\Unit;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Api\Master\Unit\AmendRequest  $request
     * @return \App\Models\Master\Unit
     */
    public function handle($request)
    {
        $unit = Unit::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $unit) {
                $unit->code = $request->input('code', $unit->code);
                $unit->name = $request->input('name', $unit->name);
                $unit->description = $request->input('description', $unit->description);
                $unit->note = $request->input('note', $unit->note);
                $unit->save();
            }
        );

        return $unit;
    }
}
