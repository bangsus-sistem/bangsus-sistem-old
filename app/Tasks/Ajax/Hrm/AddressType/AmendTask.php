<?php

namespace App\Tasks\Ajax\Hrm\AddressType;

use App\Foundation\Task;
use App\Models\Hrm\AddressType;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Ajax\Hrm\AddressType\AmendRequest  $request
     * @return \App\Models\Hrm\AddressType
     */
    public function handle($request)
    {
        $addressType = AddressType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $addressType) {
                $addressType->code = $request->input('code');
                $addressType->name = $request->input('name');
                $addressType->description = $request->input('description');
                $addressType->note = $request->input('note');
                $addressType->save();
            }
        );

        return $addressType;
    }
}
