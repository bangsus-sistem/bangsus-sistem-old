<?php

namespace App\Validation\Hrm\Division;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\Division;

class DivisionIsDeletableRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $division = Division::findOrFail($this->request->input('id'));
        if ($division->jobTitles()->exists()) {
            $this->setMessage('Divisi sudah dipakai.');
            return false;
        }

        return true;
    }
}
