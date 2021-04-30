<?php

namespace App\Transformer\SingleResources\Auth;

use App\Foundation\Transformer\SingleResource;

class RoleSingleResource extends SingleResource
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
            'user_create_id' => $this->user_create_id,
            'user_update_id' => $this->user_update_id,
            'user_delete_id' => $this->user_delete_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
