<?php

namespace App\Tasks\Api\Hrm\Gender;

use App\Foundation\Task;
use App\Models\Hrm\Gender;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Api\Hrm\Gender\AmendRequest  $request
     * @return \App\Models\Hrm\Gender
     */
    public function handle($request)
    {
        $gender = Gender::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $gender) {
                $gender->code = $request->input('code', $gender->code);
                $gender->name = $request->input('name', $gender->name);
                $gender->description = $request->input('description', $gender->description);
                $gender->note = $request->input('note', $gender->note);
                $gender->save();
            }
        );

        return $gender;
    }
}
