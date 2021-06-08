<?php

namespace App\Transformer\PaginatedResources\Hrm;

use App\Foundation\Transformer\PaginatedResource;
use App\Transformer\SingleResources\Hrm\DivisionSingleResource;

class JobTitlePaginatedResource extends PaginatedResource
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
            'division' => new DivisionSingleResource($this->division),
            'active' => (bool) $this->active,
        ];
    }
}
