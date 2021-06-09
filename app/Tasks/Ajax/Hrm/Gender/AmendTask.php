<?php

namespace App\Tasks\Ajax\Hrm\Gender;

use App\Foundation\Task;
use App\Models\Hrm\Gender;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Ajax\Hrm\Gender\AmendRequest  $request
     * @return \App\Models\Hrm\Gender
     */
    public function handle($request)
    {
        $gender = Gender::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $gender) {
                $gender->code = $request->input('code');
                $gender->name = $request->input('name');
                $gender->description = $request->input('description');
                $gender->note = $request->input('note');
                $gender->save();
            }
        );

        return $gender;
    }
}
