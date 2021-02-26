<?php

namespace App\Abstracts\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class RelatedCollection extends ResourceCollection
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection;
    }
}
