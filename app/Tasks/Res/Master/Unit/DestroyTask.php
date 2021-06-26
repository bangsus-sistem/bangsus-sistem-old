<?php

namespace App\Tasks\Res\Master\Unit;

use Waffleboss\Foundation\Task;
use App\Models\Master\Unit;

class DestroyTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Master\Unit\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $unit = Unit::findOrFail($request->input('id'));
        $this->transaction(
            fn () => $unit->delete()
        );
    }
}
