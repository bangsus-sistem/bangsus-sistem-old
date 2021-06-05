<?php

namespace App\Tasks\Res\Hrm\ContactType;

use App\Foundation\Task;
use App\Models\Hrm\ContactType;

class DestroyTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\ContactType\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $contactType = ContactType::findOrFail($request->input('id'));
        $this->transaction(
            fn () => $contactType->delete()
        );
    }
}
