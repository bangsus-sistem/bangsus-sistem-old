<?php

namespace App\Transformer\PaginatedResources\Auth;

use App\Foundation\Transformer\PaginatedResource;

class ReportPaginatedResource extends PaginatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'package' => new PackagePaginatedResource($this->package),
            'ref' => $this->ref,
            'name' => $this->name,
        ];
    }
}
