<?php

namespace App\Transformer\PaginatedResources\Hrm;

use App\Foundation\Transformer\PaginatedResource;

class GenderPaginatedResource extends PaginatedResource
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
            'active' => (bool) $this->active,
        ];
    }
}
