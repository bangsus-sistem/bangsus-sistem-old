<?php

namespace App\Transformers\SingleResources\Auth;

use App\Abstracts\Transformers\SingleResource;

class FeatureSingleResource extends SingleResource
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
            'ref' => $this->ref,
            'name' => $this->name,
        ];
    }
}
