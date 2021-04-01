<?php

namespace App\Transformers\PaginatedResources\Auth;

use App\Abstracts\Transformers\PaginatedResource;

class PackagePaginatedResource extends PaginatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ref' => $this->ref,
            'name' => $this->name,
        ];
    }
}
