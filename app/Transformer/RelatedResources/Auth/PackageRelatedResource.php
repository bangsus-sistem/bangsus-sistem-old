<?php

namespace App\Transformer\RelatedResources\Auth;

use App\Foundation\Transformer\RelatedResource;
use App\Transformer\SingleCollections\Auth\ModuleSingleCollection;

class PackageRelatedResource extends RelatedResource
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
            'modules' => new ModuleSingleCollection($this->modules),
        ];
    }
}
