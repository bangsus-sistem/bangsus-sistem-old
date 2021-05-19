<?php

namespace App\Tasks\Api\Auth\User;

use App\Foundation\Task;
use App\Models\Auth\User;
use App\Models\System\Branch;

class AmendTask extends Task
{
    /**
     * @param  \App\Http\Requests\Api\Auth\User\AmendRequest  $request
     * @return \App\Models\Auth\User
     */
    public function handle($request)
    {
        $user = User::findOrFail($request->input('id'));
        $this->transaction(
            function () use ($request, $user) {
                $user->username = $request->input('username', $user->username);
                $user->full_name = $request->input('full_name', $user->full_name);
                $user->all_branches = $request->boolean('all_branches', $user->all_branches);
                $user->description = $request->input('description', $user->description);
                $user->note = $request->input('note', $user->note);
                $user->save();

                if ( ! $user->all_branches)
                    $user->branches()->sync($request->input('branch_ids'));
                else
                    $user->branches()->sync(Branch::get()->pluck('id')->all());
            }
        );

        return $user;
    }
}
