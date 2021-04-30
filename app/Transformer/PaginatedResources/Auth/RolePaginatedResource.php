<?php

namespace App\Transformer\PaginatedResources\Auth;

use App\Foundation\Transformer\PaginatedResource;

class RolePaginatedResource extends PaginatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'active' => $this->active,
            'locked' => $this->locked,
            'hidden' => $this->hidden,
            'all_features' => $this->all_features,
            'all_widgets' => $this->all_widgets,
            'all_reports' => $this->all_reports,
        ];
    }
}
