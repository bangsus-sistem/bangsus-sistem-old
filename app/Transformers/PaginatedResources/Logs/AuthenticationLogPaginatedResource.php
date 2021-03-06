<?php

namespace App\Transformers\PaginatedResources\Logs;

use App\Abstracts\Transformers\PaginatedResource;

class AuthenticationLogPaginatedResource extends PaginatedResource
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
            'state' => $this->state,
        ];
    }
}
