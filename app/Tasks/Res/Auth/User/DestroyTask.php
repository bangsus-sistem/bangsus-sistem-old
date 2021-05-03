<?php

namespace App\Tasks\Res\Auth\User;

use App\Foundation\Task;
use App\Models\Auth\User;

class DestroyTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Auth\User\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $user = User::findOrFail($request->input('id'));
        $this->transaction(
            fn () => $user->delete()
        );
    }
}
