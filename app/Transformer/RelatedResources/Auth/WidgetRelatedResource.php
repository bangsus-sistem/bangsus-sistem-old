<?php

namespace App\Transformers\RelatedResources\Auth;

use App\Abstracts\Transformers\RelatedResource;
use App\Transformers\SingleResources\Auth\{
    ModuleSingleResource,
    WidgetTypeSingleResource,
};

class WidgetRelatedResource extends RelatedResource
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
            'widget_type' => new WidgetTypeSingleResource($this->widgetType),
        ];
    }
}
