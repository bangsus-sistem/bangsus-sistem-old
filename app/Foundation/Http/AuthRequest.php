<?php

namespace App\Foundation\Http;

use Illuminate\Support\Facade\Auth;
use Illuminate\Support\Str;

class AuthRequest extends FormRequest
{
    /**
     * @return boolean
     */
    public function authorize()
    {
        $type = $this->type;
        $model = config('http.request.'.$type.'.model');
        if ( ! (new $model) instanceof AuthModel) {
            throw new AuthorizedRequestException;
        }
        $instance = $model::getAuthorization($this->refs);

        $userClass = config('auth.providers.users.model');
        $user = $userClass::findOrFail(Auth::id());
        $role = $user->role;

        return $role->{Str::plural($type)}()->find($feature->id)->exists();
    }
}
