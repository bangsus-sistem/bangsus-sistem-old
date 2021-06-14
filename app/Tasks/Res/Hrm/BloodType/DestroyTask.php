<?php

namespace App\Tasks\Res\Hrm\BloodType;

use App\Foundation\Task;
use App\Models\Hrm\BloodType;

class DestroyTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\BloodType\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $bloodType = BloodType::findOrFail($request->input('id'));
        $this->transaction(
            fn () => $bloodType->delete()
        );
    }
}
