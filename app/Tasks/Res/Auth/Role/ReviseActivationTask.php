<?php

namespace App\Tasks\Res\Auth\Role;

use App\Foundation\Task;
use App\Models\Auth\Role;

class ReviseActivationTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Auth\Role\ReviseActivationRequest  $request
     * @param  bool  $state
     * @return \App\Models\Auth\Role
     */
    public function handle($request, $state = true)
    {
        $role = Role::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $role, $state) {
                $role->active = $state;
                $role->save();
            }
        );

        return $role;
    }
}
