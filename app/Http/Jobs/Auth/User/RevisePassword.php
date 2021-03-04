<?php

namespace App\Http\Jobs\Auth\User;

use App\Abstracts\Http\Job;
use App\Database\Models\Auth\User;
use Illuminate\Support\Facades\Hash;

class RevisePasswordJob extends Job
{
    /**
     * @param  \App\Http\Requests\Res\Auth\User\RevisePasswordRequest  $request
     * @param  bool  $active
     * @return \App\Database\Models\Auth\User
     */
    public function handle($request, bool $active = true)
    {
        $user = User::findOrFail($request->input('id'));
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return $user;
    }
}
