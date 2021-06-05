<?php

namespace App\Tasks\Ajax\Hrm\ContactType;

use App\Foundation\Task;
use App\Models\Hrm\ContactType;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Ajax\Hrm\ContactType\AmendRequest  $request
     * @return \App\Models\Hrm\ContactType
     */
    public function handle($request)
    {
        $contactType = ContactType::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $contactType) {
                $contactType->code = $request->input('code');
                $contactType->name = $request->input('name');
                $contactType->required = $request->boolean('required');
                $contactType->description = $request->input('description');
                $contactType->note = $request->input('note');
                $contactType->save();
            }
        );

        return $contactType;
    }
}
