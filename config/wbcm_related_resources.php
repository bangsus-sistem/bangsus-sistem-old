<?php

return [
    'auth' => [
        'action' => \Waffleboss\Library\Transformer\RelatedResources\Auth\ActionRelatedResource::class,
        'feature' => \Waffleboss\Library\Transformer\RelatedResources\Auth\FeatureRelatedResource::class,
        'module' => \Waffleboss\Library\Transformer\RelatedResources\Auth\ModuleRelatedResource::class,
        'package' => \Waffleboss\Library\Transformer\RelatedResources\Auth\PackageRelatedResource::class,
        'report' => \Waffleboss\Library\Transformer\RelatedResources\Auth\ReportRelatedResource::class,
        'role' => \Waffleboss\Library\Transformer\RelatedResources\Auth\RoleRelatedResource::class,
        'user' => \Waffleboss\Library\Transformer\RelatedResources\Auth\UserRelatedResource::class,
        'widget' => \Waffleboss\Library\Transformer\RelatedResources\Auth\WidgetRelatedResource::class,
    ],
    'log' => [
        'authentication_log' => \Waffleboss\Library\Transformer\RelatedResources\Log\AuthenticationLogRelatedResource::class,
        'feature_log' => \Waffleboss\Library\Transformer\RelatedResources\Log\FeatureLogRelatedResource::class,
        'widget_log' => \Waffleboss\Library\Transformer\RelatedResources\Log\WidgetLogRelatedResource::class,
        'report_log' => \Waffleboss\Library\Transformer\RelatedResources\Log\ReportLogRelatedResource::class,
    ],
    'system' => [
        'branch_type' => \Waffleboss\Library\Transformer\RelatedResources\System\BranchTypeRelatedResource::class,
        'branch' => \Waffleboss\Library\Transformer\RelatedResources\System\BranchRelatedResource::class,
    ],
    'accounting' => [
        'trial_balance_account_group' => \Waffleboss\Library\Transformer\RelatedResources\Accounting\TrialBalanceAccountGroupRelatedResource::class,
        'profit_loss_account_group' => \Waffleboss\Library\Transformer\RelatedResources\Accounting\ProfitLossAccountGroupRelatedResource::class,
        'account_type' => \Waffleboss\Library\Transformer\RelatedResources\Accounting\AccountTypeRelatedResource::class,
        'account' => \Waffleboss\Library\Transformer\RelatedResources\Accounting\AccountRelatedResource::class,
    ],
    'master' => [
        'unit' => \Waffleboss\Library\Transformer\RelatedResources\Master\UnitRelatedResource::class,
        'product_type' => \Waffleboss\Library\Transformer\RelatedResources\Master\ProductTypeRelatedResource::class,
        'product_category' => \Waffleboss\Library\Transformer\RelatedResources\Master\ProductCategoryRelatedResource::class,
        'product' => \App\Transformer\RelatedResources\Master\ProductRelatedResource::class,
        'warehouse' => \Waffleboss\Library\Transformer\RelatedResources\Master\WarehouseRelatedResource::class,
    ],
    'hrm' => [
        'address_type' => \Waffleboss\Library\Transformer\RelatedResources\Hrm\AddressTypeRelatedResource::class,
        'attendance_type' => \Waffleboss\Library\Transformer\RelatedResources\Hrm\AttendanceTypeRelatedResource::class,
        'blood_type' => \Waffleboss\Library\Transformer\RelatedResources\Hrm\BloodTypeRelatedResource::class,
        'contact_type' => \Waffleboss\Library\Transformer\RelatedResources\Hrm\ContactTypeRelatedResource::class,
        'division' => \Waffleboss\Library\Transformer\RelatedResources\Hrm\DivisionRelatedResource::class,
        'employee' => \Waffleboss\Library\Transformer\RelatedResources\Hrm\EmployeeRelatedResource::class,
        'employee_address' => \Waffleboss\Library\Transformer\RelatedResources\Hrm\EmployeeAddressRelatedResource::class,
        'employee_assignment' => \Waffleboss\Library\Transformer\RelatedResources\Hrm\EmployeeAssignmentRelatedResource::class,
        'employee_contact' => \Waffleboss\Library\Transformer\RelatedResources\Hrm\EmployeeContactRelatedResource::class,
        'employee_mutation' => \Waffleboss\Library\Transformer\RelatedResources\Hrm\EmployeeMutationRelatedResource::class,
        'employee_photo' => \Waffleboss\Library\Transformer\RelatedResources\Hrm\EmployeePhotoRelatedResource::class,
        'employee_photo_type' => \Waffleboss\Library\Transformer\RelatedResources\Hrm\EmployeePhotoTypeRelatedResource::class,
        'gender' => \Waffleboss\Library\Transformer\RelatedResources\Hrm\GenderRelatedResource::class,
        'job_title' => \Waffleboss\Library\Transformer\RelatedResources\Hrm\JobTitleRelatedResource::class,
    ],
];
