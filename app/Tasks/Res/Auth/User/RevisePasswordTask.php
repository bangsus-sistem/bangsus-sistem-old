<?php

namespace App\Tasks\Res\Auth\User;

use App\Foundation\Task;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;

class RevisePasswordTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Auth\User\RevisePasswordRequest  $request
     * @param  bool  $state
     * @return \App\Models\Auth\User
     */
    public function handle($request)
    {
        $user = User::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $user) {
                $user->password = Hash::make($request->input('password'));
                $user->save();
            }
        );

        return $user;
    }
}
