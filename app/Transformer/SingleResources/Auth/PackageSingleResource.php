<?php

namespace App\Transformer\SingleResources\Auth;

use App\Foundation\Transformer\SingleResource;

class PackageSingleResource extends SingleResource
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
