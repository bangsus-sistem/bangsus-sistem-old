<?php

namespace App\Transformer\PaginatedResources\Hrm;

use App\Foundation\Transformer\PaginatedResource;

class BloodTypePaginatedResource extends PaginatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'active' => (bool) $this->active,
        ];
    }
}
