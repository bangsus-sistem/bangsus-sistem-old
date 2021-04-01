<?php

namespace App\Transformers\RelatedResources\Auth;

use App\Abstracts\Transformers\RelatedResource;
use App\Transformers\SingleResources\Auth\PackageSingleResource;
use App\Transformers\RelatedCollections\Auth\WidgetRelatedCollection;

class WidgetTypeRelatedResource extends RelatedResource
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
            'widgets' => new WidgetRelatedCollection($this->widgets),
        ];
    }
}
