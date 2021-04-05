<?php

namespace App\Transformer\SingleResources\Log;

use App\Foundation\Transformer\SingleResource;

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
            'state' => (bool) $this->state,
        ];
    }
}
