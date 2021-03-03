<?php

namespace App\Validation\Auth\Role;

use Illuminate\Contracts\Validation\Rule;
use App\Database\Models\Auth\User;

class RoleIsDeletableRule implements Rule
{
    /**
     * @var string
     */
    protected $message = '';

    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (User::where('role_id', $value)->exists()) {
            $this->message = __('validation.auth.role_is_deletable.role_has_user');
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}