<?php

namespace App\Transformer\SingleResources\Auth;

use App\Foundation\Transformer\SingleResource;

class ReportSingleResource extends SingleResource
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
            'package_id' => $this->package_id,
        ];
    }
}
