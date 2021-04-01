<?php

namespace App\Transformers\PaginatedResources\Auth;

use App\Abstracts\Transformers\PaginatedResource;

class RolePaginatedResource extends PaginatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'active' => $this->active,
            'locked' => $this->locked,
            'all_access' => $this->all_access,
        ];
    }
}
