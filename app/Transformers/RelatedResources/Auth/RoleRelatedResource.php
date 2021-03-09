<?php

namespace App\Transformers\RelatedResources\Auth;

use App\Abstracts\Transformers\RelatedResource;
use App\Transformers\SingleResources\Auth\UserSingleResource;
use App\Transformers\RelatedCollections\Auth\RoleFeatureRelatedCollection;

class RoleRelatedResource extends RelatedResource
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
            'all_access' => $this->all_access,
            'role_features' => new RoleFeatureRelatedCollection($this->roleFeatures),
            'user_create' => new UserSingleResource($this->userCreate),
            'created_at' => $this->created_at,
            'user_update' => new UserSingleResource($this->userUpdate),
            'updated_at' => $this->updated_at,
            'user_delete' => new UserSingleResource($this->userDelete),
            'deleted_at' => $this->deleted_at,
        ];
    }
}
