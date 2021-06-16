<?php

namespace App\Validation\Hrm\AddressType;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\AddressType;

class AddressTypeIsDeletableRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $addressType = AddressType::findOrFail(
            $this->request->input('id')
        );
        if ($addressType->employeeAddresses()->exists()) {
            $this->setMessage('Tipe Alamat sudah dipakai.');
            return false;
        }

        return true;
    }
}
