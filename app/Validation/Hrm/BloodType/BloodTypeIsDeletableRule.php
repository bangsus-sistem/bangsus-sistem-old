<?php

namespace App\Validation\Hrm\BloodType;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\BloodType;

class BloodTypeIsDeletableRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $bloodType = BloodType::findOrFail(
            $this->request->input('id')
        );
        if ($bloodType->employees()->exists()) {
            $this->setMessage('Golongan Darah sudah dipakai.');
            return false;
        }

        return true;
    }
}
