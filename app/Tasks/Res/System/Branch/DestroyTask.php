<?php

namespace App\Tasks\Res\System\Branch;

use App\Foundation\Task;
use App\Models\System\Branch;

class DestroyTask extends Task
{
    /**
     * @param  \App\Http\Requests\Res\System\Branch\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        $branch = Branch::findOrFail($request->input('id'));
        $this->transaction(
            fn () => $branch->delete()
        );
    }
}
