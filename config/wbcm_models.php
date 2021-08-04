<?php

return [
    'auth' => [
        'action' => \Waffleboss\Library\Models\Auth\Action::class,
        'api_token' => \Waffleboss\Library\Models\Auth\ApiToken::class,
        'bearer_token' => \Waffleboss\Library\Models\Auth\BearerToken::class,
        'entry_point' => \Waffleboss\Library\Models\Auth\EntryPoint::class,
        'feature' => \Waffleboss\Library\Models\Auth\Feature::class,
        'module' => \Waffleboss\Library\Models\Auth\Module::class,
        'package' => \Waffleboss\Library\Models\Auth\Package::class,
        'report' => \Waffleboss\Library\Models\Auth\Report::class,
        'role' => \Waffleboss\Library\Models\Auth\Role::class,
        'user' => \Waffleboss\Library\Models\Auth\User::class,
        'widget' => \Waffleboss\Library\Models\Auth\Widget::class,
    ],
    'system' => [
        'branch_type' => \Waffleboss\Library\Models\System\BranchType::class,
        'branch' => \Waffleboss\Library\Models\System\Branch::class,
    ],
    'log' => [
        'authentication_log' => \Waffleboss\Library\Models\Log\AuthenticationLog::class,
        'feature_log' => \Waffleboss\Library\Models\Log\FeatureLog::class,
        'widget_log' => \Waffleboss\Library\Models\Log\WidgetLog::class,
        'report_log' => \Waffleboss\Library\Models\Log\ReportLog::class,
    ],
    'storage' => [
        'file' => \Waffleboss\Library\Models\Storage\File::class,
        'image' => \Waffleboss\Library\Models\Storage\Image::class,
    ],
    'accounting' => [
        'trial_balance_account_group' => \Waffleboss\Library\Models\Accounting\TrialBalanceAccountGroup::class,
        'profit_loss_account_group' => \Waffleboss\Library\Models\Accounting\ProfitLossAccountGroup::class,
        'account_type' => \Waffleboss\Library\Models\Accounting\AccountType::class,
        'account' => \Waffleboss\Library\Models\Accounting\Account::class,
    ],
    'master' => [
        'unit' => \Waffleboss\Library\Models\Master\Unit::class,
        'product_type' => \Waffleboss\Library\Models\Master\ProductType::class,
        'product_category' => \Waffleboss\Library\Models\Master\ProductCategory::class,
        'warehouse' => \Waffleboss\Library\Models\Master\Warehouse::class,
    ],
    'hrm' => [
        'address_type' => \Waffleboss\Library\Models\Hrm\AddressType::class,
        'attendance_type' => \Waffleboss\Library\Models\Hrm\AttendanceType::class,
        'blood_type' => \Waffleboss\Library\Models\Hrm\BloodType::class,
        'contact_type' => \Waffleboss\Library\Models\Hrm\ContactType::class,
        'division' => \Waffleboss\Library\Models\Hrm\Division::class,
        'employee' => \Waffleboss\Library\Models\Hrm\Employee::class,
        'employee_address' => \Waffleboss\Library\Models\Hrm\EmployeeAddress::class,
        'employee_assignment' => \Waffleboss\Library\Models\Hrm\EmployeeAssignment::class,
        'employee_contact' => \Waffleboss\Library\Models\Hrm\EmployeeContact::class,
        'employee_mutation' => \Waffleboss\Library\Models\Hrm\EmployeeMutation::class,
        'employee_photo' => \Waffleboss\Library\Models\Hrm\EmployeePhoto::class,
        'employee_photo_type' => \Waffleboss\Library\Models\Hrm\EmployeePhotoType::class,
        'gender' => \Waffleboss\Library\Models\Hrm\Gender::class,
        'job_title' => \Waffleboss\Library\Models\Hrm\JobTitle::class,
    ],
];
