<?php

namespace App\Http\Jobs\Auth\User;

use App\Abstracts\Http\Job;
use App\Database\Models\Auth\User;

class ReviseActivationJob extends Job
{
    /**
     * @param  \App\Http\Requests\Res\Auth\User\ReviseActivationRequest  $request
     * @param  bool  $active
     * @return \App\Database\Models\Auth\User
     */
    public function handle($request, bool $active = true)
    {
        $user = User::findOrFail($request->input('id'));
        $user->active = $active;
        $user->save();
        return $user;
    }
}
