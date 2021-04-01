<?php

namespace App\Transformers\PaginatedResources\Auth;

use App\Abstracts\Transformers\PaginatedResource;
use App\Transformers\SingleResources\Auth\{
    ModuleSingleResource,
    ActionSingleResource,
};

class FeaturePaginatedResource extends PaginatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'module' => new ModuleSingleResource($this->module),
            'action' => new ActionSingleResource($this->action),
        ];
    }
}
