<?php

namespace App\Abstracts\Http;

use Illuminate\Auth\Access\AuthorizationException;
use App\Auth\Permission;

class AuthorizedRequest extends FormRequest
{
    /**
     * Default unauthorized message.
     * 
     * @var string
     */
    protected $unauthorizedMessage = 'messages.authorization.failed';
    
    /**
     * Automatically authorize every request.
     * 
     * @return bool
     */
    public function authorize()
    {
        return with(new Permission($this))->verify()->log()->result();
    }

    /**
     * Customize the Failed Authorization method with custom message.
     * 
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return void
     */
    protected function failedAuthorization()
    {
        throw new AuthorizationException(__($this->unauthorizedMessage));
    }
}
