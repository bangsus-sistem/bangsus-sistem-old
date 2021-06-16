<?php

namespace App\Http\Requests\Res\Hrm\Employee;

use App\Foundation\Http\AuthRequest;
use Illuminate\Validation\Rule;
use App\Validation\Hrm\EmployeeAddress\ValidEmployeeAddressesRule;
use App\Validation\Hrm\EmployeeContact\ValidEmployeeContactsRule;
use App\Validation\Hrm\EmployeePhoto\ValidEmployeePhotosRule;

class StoreRequest extends AuthRequest
{
    /**
     * @var string
     */
    protected $type = 'feature';

    /**
     * @var array
     */
    protected $refs = [
        'module' => 'employee',
        'action' => 'create',
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'nik' => [
                'required',
                'size:16',
                'unique:\App\Models\Hrm\Employee',
            ],
            'full_name' => [
                'required',
                'max:400',
            ],
            'place_of_birth' => [
                'required',
                'max:200',
            ],
            'date_of_birth' => [
                'required',
                'date',
                'date_format:Y-m-d',
            ],
            'blood_type_id' => [
                'required',
                'bsb_exists:\App\Models\Hrm\BloodType',
            ],
            'gender_id' => [
                'required',
                'bsb_exists:\App\Models\Hrm\Gender',
            ],
            'first_branch_id' => [
                'required',
                'bsb_exists:\App\Models\System\Branch',
            ],
            'first_job_title_id' => [
                'required',
                'bsb_exists:\App\Models\Hrm\JobTitle',
            ],
            'start_date' => [
                'required',
                'date',
                'date_format:Y-m-d',
            ],
            'description' => [
                'nullable',
                'max:1000',
            ],
            'note' => [
                'nullable',
                'max:1000',
            ],
            'employee_addresses.*' => [
                new ValidEmployeeAddressesRule($this),
            ],
            'employee_addresses.*.address_type_id' => [
                'nullable',
                'bsb_exists:\App\Models\Hrm\AddressType',
            ],
            'employee_addresses.*.address' => [
                'nullable',
                'max:1000',
            ],
            'employee_contacts.*' => [
                new ValidEmployeeContactsRule($this),
            ],
            'employee_contacts.*.contact_type_id' => [
                'nullable',
                'bsb_exists:\App\Models\Hrm\ContactType',
            ],
            'employee_contacts.*.contact' => [
                'nullable',
                'max:1000',
            ],
            'employee_photos.*' => [
                new ValidEmployeePhotosRule($this),
            ],
            'employee_photos.*.employee_photo_type_id' => [
                'nullable',
                'bsb_exists:\App\Models\Hrm\EmployeePhotoType',
            ],
            'employee_photos.*.image_id' => [
                'nullable',
                'bsb_exists:\App\Models\Storage\Image',
            ],
        ];
    }
}
