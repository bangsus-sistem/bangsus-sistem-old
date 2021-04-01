<?php

namespace App\Transformers\PaginatedResources\Auth;

use App\Abstracts\Transformers\PaginatedResource;

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
            'role_id' => $this->role_id,
            'active' => $this->active,
            'locked' => $this->locked,
            'all_branch_type_access' => $this->all_branch_type_access,
            'all_branch_access' => $this->all_branch_access,
        ];
    }
}
