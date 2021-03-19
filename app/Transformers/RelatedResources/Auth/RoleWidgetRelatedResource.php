<?php

namespace App\Transformers\RelatedResources\Auth;

use App\Abstracts\Transformers\RelatedResource;
use App\Transformers\SingleResources\Auth\{
    RoleSingleResource,
    WidgetSingleResource,
    UserSingleResource,
};

class RoleWidgetRelatedResource extends RelatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'role' => new RoleSingleResource($this->role),
            'feature' => new WidgetSingleResource($this->feature),
            'access' => $this->access,
            'user_create' => new UserSingleResource($this->userCreate),
            'created_at' => $this->created_at,
            'user_update' => new UserSingleResource($this->userUpdate),
            'updated_at' => $this->updated_at,
        ];
    }
}
