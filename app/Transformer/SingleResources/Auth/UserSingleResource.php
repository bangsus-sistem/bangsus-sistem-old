<?php

namespace App\Transformer\SingleResources\Auth;

use App\Foundation\Transformer\SingleResource;

class UserSingleResource extends SingleResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'password' => $this->password,
            'full_name' => $this->full_name,
            'role_id' => $this->role_id,
            'active' => $this->active,
            'locked' => $this->locked,
            'hidden' => $this->hidden,
            'all_branches' => $this->all_branches,
        ];
    }
}
