<?php

return [
    'auth' => [
        'action' => \Waffleboss\Library\Transformer\SingleResources\Auth\ActionSingleResource::class,
        'feature' => \Waffleboss\Library\Transformer\SingleResources\Auth\FeatureSingleResource::class,
        'module' => \Waffleboss\Library\Transformer\SingleResources\Auth\ModuleSingleResource::class,
        'package' => \Waffleboss\Library\Transformer\SingleResources\Auth\PackageSingleResource::class,
        'report' => \Waffleboss\Library\Transformer\SingleResources\Auth\ReportSingleResource::class,
        'role' => \Waffleboss\Library\Transformer\SingleResources\Auth\RoleSingleResource::class,
        'user' => \Waffleboss\Library\Transformer\SingleResources\Auth\UserSingleResource::class,
        'widget' => \Waffleboss\Library\Transformer\SingleResources\Auth\WidgetSingleResource::class,
    ],
    'log' => [
        'authentication_log' => \Waffleboss\Library\Transformer\SingleResources\Log\AuthenticationLogSingleResource::class,
        'feature_log' => \Waffleboss\Library\Transformer\SingleResources\Log\FeatureLogSingleResource::class,
        'widget_log' => \Waffleboss\Library\Transformer\SingleResources\Log\WidgetLogSingleResource::class,
        'report_log' => \Waffleboss\Library\Transformer\SingleResources\Log\ReportLogSingleResource::class,
    ],
    'system' => [
        'branch_type' => \Waffleboss\Library\Transformer\SingleResources\System\BranchTypeSingleResource::class,
        'branch' => \Waffleboss\Library\Transformer\SingleResources\System\BranchSingleResource::class,
    ],
    'accounting' => [
        'trial_balance_account_group' => \Waffleboss\Library\Transformer\SingleResources\Accounting\TrialBalanceAccountGroupSingleResource::class,
        'profit_loss_account_group' => \Waffleboss\Library\Transformer\SingleResources\Accounting\ProfitLossAccountGroupSingleResource::class,
        'account_type' => \Waffleboss\Library\Transformer\SingleResources\Accounting\AccountTypeSingleResource::class,
        'account' => \Waffleboss\Library\Transformer\SingleResources\Accounting\AccountSingleResource::class,
    ],
    'master' => [
        'unit' => \Waffleboss\Library\Transformer\SingleResources\Master\UnitSingleResource::class,
        'product_type' => \Waffleboss\Library\Transformer\SingleResources\Master\ProductTypeSingleResource::class,
        'product_category' => \Waffleboss\Library\Transformer\SingleResources\Master\ProductCategorySingleResource::class,
        'product' => \App\Transformer\SingleResources\Master\ProductSingleResource::class,
        'warehouse' => \Waffleboss\Library\Transformer\SingleResources\Master\WarehouseSingleResource::class,
    ],
    'hrm' => [
        'address_type' => \Waffleboss\Library\Transformer\SingleResources\Hrm\AddressTypeSingleResource::class,
        'attendance_type' => \Waffleboss\Library\Transformer\SingleResources\Hrm\AttendanceTypeSingleResource::class,
        'blood_type' => \Waffleboss\Library\Transformer\SingleResources\Hrm\BloodTypeSingleResource::class,
        'contact_type' => \Waffleboss\Library\Transformer\SingleResources\Hrm\ContactTypeSingleResource::class,
        'division' => \Waffleboss\Library\Transformer\SingleResources\Hrm\DivisionSingleResource::class,
        'employee' => \Waffleboss\Library\Transformer\SingleResources\Hrm\EmployeeSingleResource::class,
        'employee_address' => \Waffleboss\Library\Transformer\SingleResources\Hrm\EmployeeAddressSingleResource::class,
        'employee_contact' => \Waffleboss\Library\Transformer\SingleResources\Hrm\EmployeeContactSingleResource::class,
        'employee_photo' => \Waffleboss\Library\Transformer\SingleResources\Hrm\EmployeePhotoSingleResource::class,
        'employee_photo_type' => \Waffleboss\Library\Transformer\SingleResources\Hrm\EmployeePhotoTypeSingleResource::class,
        'gender' => \Waffleboss\Library\Transformer\SingleResources\Hrm\GenderSingleResource::class,
        'job_title' => \Waffleboss\Library\Transformer\SingleResources\Hrm\JobTitleSingleResource::class,
    ],
];
