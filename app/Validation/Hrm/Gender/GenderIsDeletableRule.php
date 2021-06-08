<?php

namespace App\Validation\Hrm\Gender;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\Gender;

class GenderIsDeletableRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $gender = Gender::findOrFail($this->request->input('id'));
        // if ($gender->items()->exists()) {
        //     $this->setMessage('');
        //     return false;
        // }

        return true;
    }
}
