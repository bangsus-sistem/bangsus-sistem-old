<?php

namespace App\Validation\Master\Unit;

use Waffleboss\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Master\Unit;

class UnitIsDeletableRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $unit = Unit::findOrFail($this->request->input('id'));
        // if ($unit->items()->exists()) {
        //     $this->setMessage('');
        //     return false;
        // }

        return true;
    }
}
