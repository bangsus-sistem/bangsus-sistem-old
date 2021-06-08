<?php

namespace App\Tasks\Res\Hrm\AddressType;

use App\Foundation\Task;
use App\Models\Hrm\AddressType;

class DestroyTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\AddressType\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $addressType = AddressType::findOrFail($request->input('id'));
        $this->transaction(
            fn () => $addressType->delete()
        );
    }
}
