<?php

namespace App\Tasks\Res\Hrm\AddressType;

use App\Foundation\Task;
use App\Models\Hrm\AddressType;

class StoreTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\AddressType\StoreRequest  $request
     * @return \App\Models\Hrm\AddressType
     */
    public function handle($request)
    {
        $addressType = new AddressType;
        $this->transaction(
            function () use ($request, $addressType) {
                $addressType->code = $request->input('code');
                $addressType->name = $request->input('name');
                $addressType->active = true;
                $addressType->required = $request->boolean('required');
                $addressType->description = $request->input('description');
                $addressType->note = $request->input('note');
                $addressType->save();
            }
        );

        return $addressType;
    }
}
