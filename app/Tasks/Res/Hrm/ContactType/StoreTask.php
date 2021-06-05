<?php

namespace App\Tasks\Res\Hrm\ContactType;

use App\Foundation\Task;
use App\Models\Hrm\ContactType;

class StoreTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Hrm\ContactType\StoreRequest  $request
     * @return \App\Models\Hrm\ContactType
     */
    public function handle($request)
    {
        $contactType = new ContactType;
        $this->transaction(
            function () use ($request, $contactType) {
                $contactType->code = $request->input('code');
                $contactType->name = $request->input('name');
                $contactType->active = true;
                $contactType->required = $request->boolean('required');
                $contactType->description = $request->input('description');
                $contactType->note = $request->input('note');
                $contactType->save();
            }
        );

        return $contactType;
    }
}
