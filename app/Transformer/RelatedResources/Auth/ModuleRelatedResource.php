<?php

namespace App\Transformer\RelatedResources\Auth;

use App\Foundation\Transformer\RelatedResource;
use App\Transformer\SingleResources\Auth\PackageSingleResource;
use App\Transformer\SingleCollections\Auth\FeatureSingleCollection;

class ModuleRelatedResource extends RelatedResource
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
            'package' => new PackageSingleResource($this->package),
            'features' => new FeatureSingleCollection($this->features),
        ];
    }
}
