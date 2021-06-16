<?php

namespace App\Validation\Hrm\EmployeePhotoType;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\EmployeePhotoType;

class EmployeePhotoTypeIsDeletableRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $employeePhotoType = EmployeePhotoType::findOrFail(
            $this->request->input('id')
        );
        if ($employeePhotoType->employeePhotos()->exists()) {
            $this->setMessage('Tipe Foto Karyawan sudah dipakai.');
            return false;
        }

        return true;
    }
}
