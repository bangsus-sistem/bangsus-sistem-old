<?php

namespace App\Foundation\Http;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Foundation\Database\Eloquent\{
    AuthModel,
    AuthModelException,
};
use Illuminate\Auth\AuthenticationException;

class AuthRequest extends FormRequest
{
    /**
     * @return boolean
     */
    public function authorize()
    {
        if ( ! Auth::check()) throw new AuthenticationException;
        $type = $this->type;
        $model = config('foundation.http.request.'.$type.'.model');
        if ( ! (new $model) instanceof AuthModel) {
            $exception = new AuthModelException;
            $exception->problem('model_has_no_contract');
            throw new $exception;
        }
        $instance = $model::getAuthorization($this->refs);

        $userClass = config('auth.providers.users.model');
        $user = $userClass::findOrFail(Auth::id());
        $role = $user->role;

        return $role->{Str::plural($type)}()->find($instance->id)->exists();
    }

    /**
     * @var array
     */
    public function rules()
    {
        return [

        ];
    }
}
