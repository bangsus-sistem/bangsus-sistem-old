<?php

namespace App\Tasks\Res\Auth\User;

use App\Foundation\Task;
use App\Models\Auth\User;

class ReviseActivationTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Auth\User\ReviseActivationRequest  $request
     * @param  bool  $state
     * @return \App\Models\Auth\User
     */
    public function handle($request, $state = true)
    {
        $user = User::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $user, $state) {
                $user->active = $state;
                $user->save();
            }
        );

        return $user;
    }
}
