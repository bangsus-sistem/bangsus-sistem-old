<?php

namespace App\Transformers\SingleResources\System;

use App\Abstracts\Transformers\SingleResource;

class BranchSingleResource extends SingleResource
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
            'branch_type_id' => $this->branch_type_id,
            'active' => $this->active,
        ];
    }
}
