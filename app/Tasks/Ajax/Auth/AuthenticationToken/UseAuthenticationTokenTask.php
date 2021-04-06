<?php

namespace App\Tasks\Ajax\Auth\AuthenticationToken;

use App\Foundation\Task;

class UseAuthenticationTokenTask extends Task
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auth\AuthenticationToken  $authenticationToken
     * @return \App\Models\Auth\AuthenticationToken
     */
    public function handle($request, $authenticationToken = null)
    {
        $authenticationToken->use();
        return $authenticationToken;
    }
}
