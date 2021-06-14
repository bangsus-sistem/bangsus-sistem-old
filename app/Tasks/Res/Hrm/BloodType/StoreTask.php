<?php

namespace App\Tasks\Res\Hrm\BloodType;

use App\Foundation\Task;
use App\Models\Hrm\BloodType;

class StoreTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\BloodType\StoreRequest  $request
     * @return \App\Models\Hrm\BloodType
     */
    public function handle($request)
    {
        $addressType = new BloodType;
        $this->transaction(
            function () use ($request, $addressType) {
                $addressType->name = $request->input('name');
                $addressType->active = true;
                $addressType->description = $request->input('description');
                $addressType->note = $request->input('note');
                $addressType->save();
            }
        );

        return $addressType;
    }
}
