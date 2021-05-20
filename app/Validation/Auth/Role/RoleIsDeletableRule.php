<?php

namespace App\Validation\Auth\Role;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Auth\Role;

class RoleIsDeletableRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $role = Role::findOrFail($this->request->input('id'));
        if ($role->locked) {
            $this->setMessage('Role tidak boleh dihapus.');
            return false;
        }
        if ($role->users()->exists()) {
            $this->setMessage('Role sudah memiliki User.');
            return false;
        }

        return true;
    }
}
