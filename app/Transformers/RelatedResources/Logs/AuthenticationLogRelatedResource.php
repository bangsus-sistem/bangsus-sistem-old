<?php

namespace App\Transformers\RelatedResources\Logs;

use App\Abstracts\Transformers\RelatedResource;
use App\Tranformers\SingleResources\Auth\UserSingleResource;

class AuthenticationLogRelatedResource extends RelatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserSingleResource($this->user),
            'state' => $this->state,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_delete' => new UserSingleResource($this->userDelete),
            'deleted_at' => $this->deleted_at,
        ];
    }
}
