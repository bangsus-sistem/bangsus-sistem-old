<?php

namespace App\Tasks\Res\Hrm\Gender;

use App\Foundation\Task;
use App\Models\Hrm\Gender;

class StoreTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\Gender\StoreRequest  $request
     * @return \App\Models\Hrm\Gender
     */
    public function handle($request)
    {
        $gender = new Gender;
        $this->transaction(
            function () use ($request, $gender) {
                $gender->code = $request->input('code');
                $gender->name = $request->input('name');
                $gender->active = true;
                $gender->description = $request->input('description');
                $gender->note = $request->input('note');
                $gender->save();
            }
        );

        return $gender;
    }
}
