<?php

namespace App\Transformers\SingleResources\Auth;

use App\Abstracts\Transformers\SingleResource;

class ModuleSingleResource extends SingleResource
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
