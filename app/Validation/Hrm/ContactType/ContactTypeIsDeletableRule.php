<?php

namespace App\Validation\Hrm\ContactType;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\ContactType;

class ContactTypeIsDeletableRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $contactType = ContactType::findOrFail(
            $this->request->input('id')
        );
        if ($contactType->employeeContacts()->exists()) {
            $this->setMessage('Tipe Kontak sudah dipakai.');
            return false;
        }

        return true;
    }
}
