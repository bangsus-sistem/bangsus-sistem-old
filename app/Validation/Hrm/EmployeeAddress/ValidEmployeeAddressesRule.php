<?php

namespace App\Validation\Hrm\EmployeeAddress;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\EmployeeAddress;

class ValidEmployeeAddressesRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $addressTypes = AddressType::all();
        foreach ($value as $employeeAddress) {
            $addressType = $addressTypes->where(
                'id',
                $employeeAddress['address_type_id'],
            )
                ->first();
            if ( ! $addressType->required) continue;

            $address = $employeeAddress['address'];
            if (is_null($address) || strlen($address) <= 0) {
                $this->setMessage('Alamat tidak boleh kosong.');
                return false;
            }
        }

        return true;
    }
}
