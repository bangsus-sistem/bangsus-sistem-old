<?php

namespace App\Transformer\PaginatedResources\Auth;

use App\Foundation\Transformer\PaginatedResource;
use App\Transformer\SingleResources\Auth\RoleSingleResource;

class UserPaginatedResource extends PaginatedResource
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
            'full_name' => $this->full_name,
            'role' => new RoleSingleResource($this->role),
            'active' => (bool) $this->active,
            'locked' => (bool) $this->locked,
            'hidden' => (bool) $this->hidden,
            'all_branches' => $this->all_branches,
        ];
    }
}
