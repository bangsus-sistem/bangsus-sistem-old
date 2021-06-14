<?php

namespace App\Tasks\Ajax\Hrm\BloodType;

use App\Foundation\Task;
use App\Models\Hrm\BloodType;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Ajax\Hrm\BloodType\AmendRequest  $request
     * @return \App\Models\Hrm\BloodType
     */
    public function handle($request)
    {
        $bloodType = BloodType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $bloodType) {
                $bloodType->name = $request->input('name');
                $bloodType->description = $request->input('description');
                $bloodType->note = $request->input('note');
                $bloodType->save();
            }
        );

        return $bloodType;
    }
}
