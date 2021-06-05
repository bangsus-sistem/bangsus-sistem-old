<?php

namespace App\Tasks\Api\Hrm\AddressType;

use App\Foundation\Task;
use App\Models\Hrm\AddressType;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Api\Hrm\AddressType\AmendRequest  $request
     * @return \App\Models\Hrm\AddressType
     */
    public function handle($request)
    {
        $addressType = AddressType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $addressType) {
                $addressType->code = $request->input('code', $addressType->code);
                $addressType->name = $request->input('name', $addressType->name);
                $addressType->required = $request->boolean('required', $addressType->required);
                $addressType->description = $request->input('description', $addressType->description);
                $addressType->note = $request->input('note', $addressType->note);
                $addressType->save();
            }
        );

        return $addressType;
    }
}
