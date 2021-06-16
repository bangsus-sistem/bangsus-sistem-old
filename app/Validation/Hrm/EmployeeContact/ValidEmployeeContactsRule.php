<?php

namespace App\Validation\Hrm\EmployeeContact;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\EmployeeContact;

class ValidEmployeeContactsRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $contactTypes = ContactType::all();
        foreach ($value as $employeeContact) {
            $contactType = $contactTypes->where(
                'id',
                $employeeContact['contact_type_id'],
            )
                ->first();
            if ( ! $contactType->required) continue;

            $contact = $employeeContact['contact'];
            if (is_null($contact) || strlen($contact) <= 0) {
                $this->setMessage('Kontak tidak boleh kosong.');
                return false;
            }
        }

        return true;
    }
}
