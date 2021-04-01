<?php

namespace App\Transformers\RelatedResources\Auth;

use App\Abstracts\Transformers\RelatedResource;
use App\Transformers\SingleResources\Auth\{
    ModuleSingleResource,
    ActionSingleResource,
};

class FeatureRelatedResource extends RelatedResource
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
