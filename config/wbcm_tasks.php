<?php

return [
    'ajax' => [
        'auth' => [
            'authentication_token' => [
                'use_authentication_token' => \Waffleboss\Library\Tasks\Ajax\Auth\AuthenticationToken\UseAuthenticationTokenTask::class,
            ],
            'role' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Auth\Role\AmendTask::class,
            ],
            'user' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Auth\User\AmendTask::class,
            ],
        ],
        'log' => [
            'authentication_log' => [
                'store' => \Waffleboss\Library\Tasks\Ajax\Log\AuthenticationLog\StoreTask::class,
            ],
        ],
        'system' => [
            'branch_type' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\System\BranchType\AmendTask::class,
            ],
            'branch' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\System\Branch\AmendTask::class,
            ],
        ],
        'accounting' => [
            'account' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Accounting\Account\AmendTask::class,
            ]
        ],
        'master' => [
            'unit' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Master\Unit\AmendTask::class,
            ],
            'product_category' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Master\ProductCategory\AmendTask::class,
            ],
            'product' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Master\Product\AmendTask::class,
            ],
            'warehouse' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Master\Warehouse\AmendTask::class,
            ],
        ],
        'hrm' => [
            'address_type' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Hrm\AddressType\AmendTask::class,
            ],
            'contact_type' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Hrm\ContactType\AmendTask::class,
            ],
            'employee_photo_type' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Hrm\EmployeePhotoType\AmendTask::class,
            ],
            'blood_type' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Hrm\BloodType\AmendTask::class,
            ],
            'gender' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Hrm\Gender\AmendTask::class,
            ],
            'division' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Hrm\Division\AmendTask::class,
            ],
            'job_title' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Hrm\JobTitle\AmendTask::class,
            ],
            'attendance_type' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Hrm\AttendanceType\AmendTask::class,
            ],
            'employee' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Hrm\Employee\AmendTask::class,
            ],
            'employee_assignment' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Hrm\EmployeeAssignment\AmendTask::class,
            ],
            'employee_mutation' => [
                'amend' => \Waffleboss\Library\Tasks\Ajax\Hrm\EmployeeMutation\AmendTask::class,
            ],
        ],
    ],
    'api' => [
        'auth' => [
            'role' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Auth\Role\AmendTask::class,
            ],
            'user' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Auth\User\AmendTask::class,
            ],
        ],
        'system' => [
            'branch_type' => [
                'amend' => \Waffleboss\Library\Tasks\Api\System\BranchType\AmendTask::class,
            ],
            'branch' => [
                'amend' => \Waffleboss\Library\Tasks\Api\System\Branch\AmendTask::class,
            ],
        ],
        'accounting' => [
            'account' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Accounting\Account\AmendTask::class,
            ]
        ],
        'master' => [
            'unit' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Master\Unit\AmendTask::class,
            ],
            'product_category' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Master\ProductCategory\AmendTask::class,
            ],
            'product' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Master\Product\AmendTask::class,
            ],
            'warehouse' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Master\Warehouse\AmendTask::class,
            ],
        ],
        'hrm' => [
            'address_type' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Hrm\AddressType\AmendTask::class,
            ],
            'contact_type' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Hrm\ContactType\AmendTask::class,
            ],
            'employee_photo_type' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Hrm\EmployeePhotoType\AmendTask::class,
            ],
            'blood_type' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Hrm\BloodType\AmendTask::class,
            ],
            'gender' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Hrm\Gender\AmendTask::class,
            ],
            'division' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Hrm\Division\AmendTask::class,
            ],
            'job_title' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Hrm\JobTitle\AmendTask::class,
            ],
            'attendance_type' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Hrm\AttendanceType\AmendTask::class,
            ],
            'employee' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Hrm\Employee\AmendTask::class,
            ],
            'employee_assignment' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Hrm\EmployeeAssignment\AmendTask::class,
            ],
            'employee_mutation' => [
                'amend' => \Waffleboss\Library\Tasks\Api\Hrm\EmployeeMutation\AmendTask::class,
            ],
        ],
    ],
    'res' => [
        'auth' => [
            'role' => [
                'store' => \Waffleboss\Library\Tasks\Res\Auth\Role\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\Auth\Role\ReviseActivationTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Auth\Role\DestroyTask::class,
            ],
            'user' => [
                'store' => \Waffleboss\Library\Tasks\Res\Auth\User\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\Auth\User\ReviseActivationTask::class,
                'revise_password' => \Waffleboss\Library\Tasks\Res\Auth\User\RevisePasswordTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Auth\User\DestroyTask::class,
            ],
        ],
        'log' => [

        ],
        'system' => [
            'branch' => [
                'store' => \Waffleboss\Library\Tasks\Res\System\Branch\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\System\Branch\ReviseActivationTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\System\Branch\DestroyTask::class,
            ],
            'branch_type' => [
                'store' => \Waffleboss\Library\Tasks\Res\System\BranchType\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\System\BranchType\ReviseActivationTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\System\BranchType\DestroyTask::class,
            ],
        ],
        'accounting' => [
            'account' =>[
                'store' => \Waffleboss\Library\Tasks\Res\Accounting\Account\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\Accounting\Account\ReviseActivationTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Accounting\Account\DestroyTask::class,
            ],
        ],
        'master' => [
            'unit' => [
                'store' => \Waffleboss\Library\Tasks\Res\Master\Unit\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\Master\Unit\ReviseActivationTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Master\Unit\DestroyTask::class,
            ],
            'product_category' => [
                'store' => \Waffleboss\Library\Tasks\Res\Master\ProductCategory\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\Master\ProductCategory\ReviseActivationTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Master\ProductCategory\DestroyTask::class,
            ],
            'product' => [
                'store' => \Waffleboss\Library\Tasks\Res\Master\Product\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\Master\Product\ReviseActivationTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Master\Product\DestroyTask::class,
            ],
            'warehouse' => [
                'store' => \Waffleboss\Library\Tasks\Res\Master\Warehouse\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\Master\Warehouse\ReviseActivationTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Master\Warehouse\DestroyTask::class,
            ],
        ],
        'hrm' => [
            'address_type' => [
                'store' => \Waffleboss\Library\Tasks\Res\Hrm\AddressType\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\Hrm\AddressType\ReviseActivationTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Hrm\AddressType\DestroyTask::class,
            ],
            'contact_type' => [
                'store' => \Waffleboss\Library\Tasks\Res\Hrm\ContactType\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\Hrm\ContactType\ReviseActivationTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Hrm\ContactType\DestroyTask::class,
            ],
            'employee_photo_type' => [
                'store' => \Waffleboss\Library\Tasks\Res\Hrm\EmployeePhotoType\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\Hrm\EmployeePhotoType\ReviseActivationTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Hrm\EmployeePhotoType\DestroyTask::class,
            ],
            'blood_type' => [
                'store' => \Waffleboss\Library\Tasks\Res\Hrm\BloodType\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\Hrm\BloodType\ReviseActivationTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Hrm\BloodType\DestroyTask::class,
            ],
            'gender' => [
                'store' => \Waffleboss\Library\Tasks\Res\Hrm\Gender\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\Hrm\Gender\ReviseActivationTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Hrm\Gender\DestroyTask::class,
            ],
            'division' => [
                'store' => \Waffleboss\Library\Tasks\Res\Hrm\Division\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\Hrm\Division\ReviseActivationTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Hrm\Division\DestroyTask::class,
            ],
            'job_title' => [
                'store' => \Waffleboss\Library\Tasks\Res\Hrm\JobTitle\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\Hrm\JobTitle\ReviseActivationTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Hrm\JobTitle\DestroyTask::class,
            ],
            'attendance_type' => [
                'store' => \Waffleboss\Library\Tasks\Res\Hrm\AttendanceType\StoreTask::class,
                'revise_activation' => \Waffleboss\Library\Tasks\Res\Hrm\AttendanceType\ReviseActivationTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Hrm\AttendanceType\DestroyTask::class,
            ],
            'employee' => [
                'store' => \Waffleboss\Library\Tasks\Res\Hrm\Employee\StoreTask::class,
                'revise_admission' => \Waffleboss\Library\Tasks\Res\Hrm\Employee\ReviseAdmissionTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Hrm\Employee\DestroyTask::class,
            ],
            'employee_assignment' => [
                'store' => \Waffleboss\Library\Tasks\Res\Hrm\EmployeeAssignment\StoreTask::class,
                'revise_admission' => \Waffleboss\Library\Tasks\Res\Hrm\EmployeeAssignment\ReviseAdmissionTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Hrm\EmployeeAssignment\DestroyTask::class,
            ],
            'employee_mutation' => [
                'store' => \Waffleboss\Library\Tasks\Res\Hrm\EmployeeMutation\StoreTask::class,
                'revise_admission' => \Waffleboss\Library\Tasks\Res\Hrm\EmployeeMutation\ReviseAdmissionTask::class,
                'destroy' => \Waffleboss\Library\Tasks\Res\Hrm\EmployeeMutation\DestroyTask::class,
            ],
        ],
    ],
];
