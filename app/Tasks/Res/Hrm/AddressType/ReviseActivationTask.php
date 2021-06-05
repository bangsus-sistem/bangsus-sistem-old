<?php

namespace App\Tasks\Res\Hrm\AddressType;

use App\Foundation\Task;
use App\Models\Hrm\AddressType;

class ReviseActivationTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\AddressType\ReviseActivationRequest  $request
     * @param  bool  $state
     * @return \App\Models\Hrm\AddressType
     */
    public function handle($request, $state = true)
    {
        $addressType = AddressType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $addressType, $state) {
                $addressType->active = $state;
                $addressType->save();
            }
        );

        return $addressType;
    }
}
