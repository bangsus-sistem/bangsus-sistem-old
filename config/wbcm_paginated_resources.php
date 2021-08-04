<?php

return [
    'auth' => [
        'action' => \Waffleboss\Library\Transformer\PaginatedResources\Auth\ActionPaginatedResource::class,
        'feature' => \Waffleboss\Library\Transformer\PaginatedResources\Auth\FeaturePaginatedResource::class,
        'module' => \Waffleboss\Library\Transformer\PaginatedResources\Auth\ModulePaginatedResource::class,
        'package' => \Waffleboss\Library\Transformer\PaginatedResources\Auth\PackagePaginatedResource::class,
        'report' => \Waffleboss\Library\Transformer\PaginatedResources\Auth\ReportPaginatedResource::class,
        'role' => \Waffleboss\Library\Transformer\PaginatedResources\Auth\RolePaginatedResource::class,
        'user' => \Waffleboss\Library\Transformer\PaginatedResources\Auth\UserPaginatedResource::class,
        'widget' => \Waffleboss\Library\Transformer\PaginatedResources\Auth\WidgetPaginatedResource::class,
    ],
    'log' => [
        'authentication_log' => \Waffleboss\Library\Transformer\PaginatedResources\Log\AuthenticationLogPaginatedResource::class,
        'feature_log' => \Waffleboss\Library\Transformer\PaginatedResources\Log\FeatureLogPaginatedResource::class,
        'widget_log' => \Waffleboss\Library\Transformer\PaginatedResources\Log\WidgetLogPaginatedResource::class,
        'report_log' => \Waffleboss\Library\Transformer\PaginatedResources\Log\ReportLogPaginatedResource::class,
    ],
    'system' => [
        'branch_type' => \Waffleboss\Library\Transformer\PaginatedResources\System\BranchTypePaginatedResource::class,
        'branch' => \Waffleboss\Library\Transformer\PaginatedResources\System\BranchPaginatedResource::class,
    ],
    'accounting' => [
        'trial_balance_account_group' => \Waffleboss\Library\Transformer\PaginatedResources\Accounting\TrialBalanceAccountGroupPaginatedResource::class,
        'profit_loss_account_group' => \Waffleboss\Library\Transformer\PaginatedResources\Accounting\ProfitLossAccountGroupPaginatedResource::class,
        'account_type' => \Waffleboss\Library\Transformer\PaginatedResources\Accounting\AccountTypePaginatedResource::class,
        'account' => \Waffleboss\Library\Transformer\PaginatedResources\Accounting\AccountPaginatedResource::class,
    ],
    'master' => [
        'unit' => \Waffleboss\Library\Transformer\PaginatedResources\Master\UnitPaginatedResource::class,
        'product_type' => \Waffleboss\Library\Transformer\PaginatedResources\Master\ProductTypePaginatedResource::class,
        'product_category' => \Waffleboss\Library\Transformer\PaginatedResources\Master\ProductCategoryPaginatedResource::class,
        'product' => \App\Transformer\PaginatedResources\Master\ProductPaginatedResource::class,
        'warehouse' => \Waffleboss\Library\Transformer\PaginatedResources\Master\WarehousePaginatedResource::class,
    ],
    'hrm' => [
        'address_type' => \Waffleboss\Library\Transformer\PaginatedResources\Hrm\AddressTypePaginatedResource::class,
        'attendance_type' => \Waffleboss\Library\Transformer\PaginatedResources\Hrm\AttendanceTypePaginatedResource::class,
        'blood_type' => \Waffleboss\Library\Transformer\PaginatedResources\Hrm\BloodTypePaginatedResource::class,
        'contact_type' => \Waffleboss\Library\Transformer\PaginatedResources\Hrm\ContactTypePaginatedResource::class,
        'division' => \Waffleboss\Library\Transformer\PaginatedResources\Hrm\DivisionPaginatedResource::class,
        'employee' => \Waffleboss\Library\Transformer\PaginatedResources\Hrm\EmployeePaginatedResource::class,
        'employee_address' => \Waffleboss\Library\Transformer\PaginatedResources\Hrm\EmployeeAddressPaginatedResource::class,
        'employee_assignment' => \Waffleboss\Library\Transformer\PaginatedResources\Hrm\EmployeeAssignmentPaginatedResource::class,
        'employee_mutation' => \Waffleboss\Library\Transformer\PaginatedResources\Hrm\EmployeeMutationPaginatedResource::class,
        'employee_contact' => \Waffleboss\Library\Transformer\PaginatedResources\Hrm\EmployeeContactPaginatedResource::class,
        'employee_photo' => \Waffleboss\Library\Transformer\PaginatedResources\Hrm\EmployeePhotoPaginatedResource::class,
        'employee_photo_type' => \Waffleboss\Library\Transformer\PaginatedResources\Hrm\EmployeePhotoTypePaginatedResource::class,
        'gender' => \Waffleboss\Library\Transformer\PaginatedResources\Hrm\GenderPaginatedResource::class,
        'job_title' => \Waffleboss\Library\Transformer\PaginatedResources\Hrm\JobTitlePaginatedResource::class,
    ],
];
