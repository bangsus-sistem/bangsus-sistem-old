<?php

namespace App\Transformer\PaginatedResources\System;

use App\Foundation\Transformer\PaginatedResource;
use App\Transformer\SingleResources\System\BranchTypeSingleResource;

class BranchPaginatedResource extends PaginatedResource
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
            'branch_type' => new BranchTypeSingleResource($this->branchType),
            'active' => (bool) $this->active,
            'locked' => (bool) $this->locked,
            'hidden' => (bool) $this->hidden,
        ];
    }
}
