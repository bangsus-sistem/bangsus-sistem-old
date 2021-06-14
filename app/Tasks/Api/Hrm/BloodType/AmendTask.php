<?php

namespace App\Tasks\Api\Hrm\BloodType;

use App\Foundation\Task;
use App\Models\Hrm\BloodType;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Api\Hrm\BloodType\AmendRequest  $request
     * @return \App\Models\Hrm\BloodType
     */
    public function handle($request)
    {
        $bloodType = BloodType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $bloodType) {
                $bloodType->name = $request->input('name', $bloodType->name);
                $bloodType->required = $request->boolean('required', $bloodType->required);
                $bloodType->description = $request->input('description', $bloodType->description);
                $bloodType->note = $request->input('note', $bloodType->note);
                $bloodType->save();
            }
        );

        return $bloodType;
    }
}
