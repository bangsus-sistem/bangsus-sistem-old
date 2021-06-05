<?php

namespace App\Tasks\Res\Hrm\ContactType;

use App\Foundation\Task;
use App\Models\Hrm\ContactType;

class ReviseActivationTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\ContactType\ReviseActivationRequest  $request
     * @param  bool  $state
     * @return \App\Models\Hrm\ContactType
     */
    public function handle($request, $state = true)
    {
        $contactType = ContactType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $contactType, $state) {
                $contactType->active = $state;
                $contactType->save();
            }
        );

        return $contactType;
    }
}
