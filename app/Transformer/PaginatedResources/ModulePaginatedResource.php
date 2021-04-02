<?php

namespace App\Transformer\PaginatedResources\Auth;

use App\Foundation\Transformer\PaginatedResource;

class ModulePaginatedResource extends PaginatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'package_id' => $this->package_id,
            'ref' => $this->ref,
            'name' => $this->name,
        ];
    }
}
