<?php

namespace App\Transformers\RelatedResources\Logs;

use App\Abstracts\Transformers\RelatedResource;
use App\Transformers\RelatedResources\Auth\FeatureRelatedResource;
use App\Transformers\SingleResources\Auth\UserSingleResource;

class FeatureLogRelatedResource extends RelatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'feature' => new FeatureRelatedResource($this->feature),
            'user' => new UserSingleResource($this->user),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_delete' => new UserSingleResource($this->userDelete),
            'deleted_at' => $this->deleted_at,
        ];
    }
}
