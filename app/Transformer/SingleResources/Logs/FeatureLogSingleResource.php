<?php

namespace App\Transformers\SingleResources\Logs;

use App\Abstracts\Transformers\SingleResource;

class AuthenticationLogSingleResource extends SingleResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'feature_id' => $this->feature_id,
        ];
    }
}
