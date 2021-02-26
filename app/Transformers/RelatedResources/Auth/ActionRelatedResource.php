<?php

namespace App\Transformers\RelatedResources\Auth;

use App\Abstracts\Transformers\RelatedResource;
use App\Transformers\SingleResources\Auth\PackageSingleResource;
use App\Transformers\RelatedCollections\Auth\FeatureRelatedCollection;

class ActionRelatedResource extends RelatedResource
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
            'features' => new FeatureRelatedCollection($this->features),
        ];
    }
}
