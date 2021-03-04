<?php

namespace App\Http\Jobs\Auth\User;

use App\Abstracts\Http\Job;
use App\Database\Models\Auth\User;
use App\Database\Models\System\Branch;

class AmendJob extends Job
{
    /**
     * @param  \App\Http\Requests\Res\Auth\User\AmendRequest  $request
     * @return \App\Database\Models\Auth\User
     */
    public function handle($request)
    {
        $user = User::findOrFail($request->input('id'));
        \DB::transaction(function () use ($request) {
            $user->username = $request->input('username');
            $user->full_name = $request->input('full_name');
            $user->role_id = $request->input('role_id');
            $user->active = true;
            $user->locked = false;
            $user->note = $request->input('note');
            $user->save();

            if ($request->boolean('all_branch_access')) {
                $user->branches()->sync(Branch::all()->pluck('id')->all());
            } else {
                foreach ($request->input('branch_type_ids') as $branchTypeId)
                    $user->branches()->sync(
                        Branch::where(
                            'branch_type_id', $branchTypeId
                        )->get()->pluck('id')->all()
                    );
                $user->branches()->syncWithoutDetaching(
                    $request->input('branch_ids')
                );
            }
        });
        return $user;
    }
}
