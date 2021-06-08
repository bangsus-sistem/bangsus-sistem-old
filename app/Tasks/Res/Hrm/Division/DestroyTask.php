<?php

namespace App\Tasks\Res\Hrm\Division;

use App\Foundation\Task;
use App\Models\Hrm\Division;

class DestroyTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\Division\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $division = Division::findOrFail($request->input('id'));
        $this->transaction(
            fn () => $division->delete()
        );
    }
}
