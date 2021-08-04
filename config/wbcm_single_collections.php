<?php

return [
    'auth' => [
        'action' => \Waffleboss\Library\Transformer\SingleCollections\Auth\ActionSingleCollection::class,
        'feature' => \Waffleboss\Library\Transformer\SingleCollections\Auth\FeatureSingleCollection::class,
        'module' => \Waffleboss\Library\Transformer\SingleCollections\Auth\ModuleSingleCollection::class,
        'package' => \Waffleboss\Library\Transformer\SingleCollections\Auth\PackageSingleCollection::class,
        'report' => \Waffleboss\Library\Transformer\SingleCollections\Auth\ReportSingleCollection::class,
        'role' => \Waffleboss\Library\Transformer\SingleCollections\Auth\RoleSingleCollection::class,
        'user' => \Waffleboss\Library\Transformer\SingleCollections\Auth\UserSingleCollection::class,
        'widget' => \Waffleboss\Library\Transformer\SingleCollections\Auth\WidgetSingleCollection::class,
    ],
    'log' => [
        'authentication_log' => \Waffleboss\Library\Transformer\SingleCollections\Log\AuthenticationLogSingleCollection::class,
        'feature_log' => \Waffleboss\Library\Transformer\SingleCollections\Log\FeatureLogSingleCollection::class,
        'widget_log' => \Waffleboss\Library\Transformer\SingleCollections\Log\WidgetLogSingleCollection::class,
        'report_log' => \Waffleboss\Library\Transformer\SingleCollections\Log\ReportLogSingleCollection::class,
    ],
    'system' => [
        'branch_type' => \Waffleboss\Library\Transformer\SingleCollections\System\BranchTypeSingleCollection::class,
        'branch' => \Waffleboss\Library\Transformer\SingleCollections\System\BranchSingleCollection::class,
    ],
    'accounting' => [
        'trial_balance_account_group' => \Waffleboss\Library\Transformer\SingleCollections\Accounting\TrialBalanceAccountGroupSingleCollection::class,
        'profit_loss_account_group' => \Waffleboss\Library\Transformer\SingleCollections\Accounting\ProfitLossAccountGroupSingleCollection::class,
        'account_type' => \Waffleboss\Library\Transformer\SingleCollections\Accounting\AccountTypeSingleCollection::class,
        'account' => \Waffleboss\Library\Transformer\SingleCollections\Accounting\AccountSingleCollection::class,
    ],
    'master' => [
        'unit' => \Waffleboss\Library\Transformer\SingleCollections\Master\UnitSingleCollection::class,
        'product_type' => \Waffleboss\Library\Transformer\SingleCollections\Master\ProductTypeSingleCollection::class,
        'product_category' => \Waffleboss\Library\Transformer\SingleCollections\Master\ProductCategorySingleCollection::class,
        'product' => \App\Transformer\SingleCollections\Master\ProductSingleCollection::class,
        'warehouse' => \Waffleboss\Library\Transformer\SingleCollections\Master\WarehouseSingleCollection::class,
    ],
    'hrm' => [
        'address_type' => \Waffleboss\Library\Transformer\SingleCollections\Hrm\AddressTypeSingleCollection::class,
        'attendance_type' => \Waffleboss\Library\Transformer\SingleCollections\Hrm\AttendanceTypeSingleCollection::class,
        'blood_type' => \Waffleboss\Library\Transformer\SingleCollections\Hrm\BloodTypeSingleCollection::class,
        'contact_type' => \Waffleboss\Library\Transformer\SingleCollections\Hrm\ContactTypeSingleCollection::class,
        'division' => \Waffleboss\Library\Transformer\SingleCollections\Hrm\DivisionSingleCollection::class,
        'employee' => \Waffleboss\Library\Transformer\SingleCollections\Hrm\EmployeeSingleCollection::class,
        'employee_address' => \Waffleboss\Library\Transformer\SingleCollections\Hrm\EmployeeAddressSingleCollection::class,
        'employee_contact' => \Waffleboss\Library\Transformer\SingleCollections\Hrm\EmployeeContactSingleCollection::class,
        'employee_photo' => \Waffleboss\Library\Transformer\SingleCollections\Hrm\EmployeePhotoSingleCollection::class,
        'employee_photo_type' => \Waffleboss\Library\Transformer\SingleCollections\Hrm\EmployeePhotoTypeSingleCollection::class,
        'gender' => \Waffleboss\Library\Transformer\SingleCollections\Hrm\GenderSingleCollection::class,
        'job_title' => \Waffleboss\Library\Transformer\SingleCollections\Hrm\JobTitleSingleCollection::class,
    ],
];
