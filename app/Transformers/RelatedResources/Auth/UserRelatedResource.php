<?php

namespace App\Transformers\RelatedResources\Auth;

use App\Abstracts\Transformers\RelatedResource;
use App\Transformers\SingleResources\Auth\{
    RoleSingleResource,
    UserSingleResource,
};
use App\Transformers\SingleCollections\System\BranchSingleCollection;

class UserRelatedResource extends RelatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'full_name' => $this->full_name,
            'role' => new RoleSingleResource($this->role),
            'active' => $this->active,
            'locked' => $this->locked,
            'branches' => new BranchSingleCollection($this->branches),
            'user_create' => new UserSingleResource($this->userCreate),
            'created_at' => $this->created_at,
            'user_update' => new UserSingleResource($this->userUpdate),
            'updated_at' => $this->updated_at,
            'user_delete' => new UserSingleResource($this->userDelete),
            'deleted_at' => $this->deleted_at,
        ];
    }
}
