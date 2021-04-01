<?php

namespace App\Foundation\Transformer;

use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class SingleCollection extends ResourceCollection
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
