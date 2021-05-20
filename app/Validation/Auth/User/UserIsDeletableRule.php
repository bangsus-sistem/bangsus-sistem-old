<?php

namespace App\Validation\Auth\User;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Auth\User;

class UserIsDeletableRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = User::findOrFail($this->request->input('id'));
        if ($user->locked) {
            $this->setMessage('User tidak boleh dihapus.');
            return false;
        }

        return true;
    }
}
