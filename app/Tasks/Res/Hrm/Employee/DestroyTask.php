<?php

namespace App\Tasks\Res\Hrm\Employee;

use App\Foundation\Task;
use App\Models\Hrm\Employee;

class DestroyTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\Employee\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $employee = Employee::findOrFail($request->input('id'));
        $this->transaction(
            fn () => $employee->delete()
        );
    }
}
