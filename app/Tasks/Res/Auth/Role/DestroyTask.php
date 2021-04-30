<?php

namespace App\Tasks\Res\Auth\Role;

use App\Foundation\Task;
use App\Models\Auth\{
    Role,
    Feature,
    Widget,
    Report,
};

class DestroyTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\Auth\Role\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $role = Role::findOrFail($request->input('id'));
        $this->transaction(
            fn () => $role->delete()
        );
    }
}
