<?php

namespace App\Transformers\PaginatedResources\Auth;

use App\Abstracts\Transformers\PaginatedResource;
use App\Transformers\SingleResources\Auth\PackageSingleResource;

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
            'package' => new PackageSingleResource($this->package),
            'ref' => $this->ref,
            'name' => $this->name,
        ];
    }
}
