<?php

namespace App\Validation\Hrm\EmployeePhoto;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\EmployeePhoto;

class ValidEmployeePhotosRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $photoTypes = PhotoType::all();
        foreach ($value as $employeePhoto) {
            $photoType = $photoTypes->where(
                'id',
                $employeePhoto['photo_type_id'],
            )
                ->first();
            if ( ! $photoType->required) continue;

            if (is_null($employeePhoto['image_id'])) {
                $this->setMessage('Foto tidak boleh kosong.');
                return false;
            }
        }

        return true;
    }
}
