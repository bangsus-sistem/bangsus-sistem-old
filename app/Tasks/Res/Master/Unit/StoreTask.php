<?php

namespace App\Tasks\Res\Master\Unit;

use Waffleboss\Foundation\Task;
use App\Models\Master\Unit;

class StoreTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Master\Unit\StoreRequest  $request
     * @return \App\Models\Master\Unit
     */
    public function handle($request)
    {
        $unit = new Unit;
        $this->transaction(
            function () use ($request, $unit) {
                $unit->code = $request->input('code');
                $unit->name = $request->input('name');
                $unit->active = true;
                $unit->description = $request->input('description');
                $unit->note = $request->input('note');
                $unit->save();
            }
        );

        return $unit;
    }
}
