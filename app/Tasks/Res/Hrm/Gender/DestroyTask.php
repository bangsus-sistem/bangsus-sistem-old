<?php

namespace App\Tasks\Res\Hrm\Gender;

use App\Foundation\Task;
use App\Models\Hrm\Gender;

class DestroyTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\Gender\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $gender = Gender::findOrFail($request->input('id'));
        $this->transaction(
            fn () => $gender->delete()
        );
    }
}
