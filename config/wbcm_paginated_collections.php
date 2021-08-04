<?php

return [
    'auth' => [
        'action' => \Waffleboss\Library\Transformer\PaginatedCollections\Auth\ActionPaginatedCollection::class,
        'feature' => \Waffleboss\Library\Transformer\PaginatedCollections\Auth\FeaturePaginatedCollection::class,
        'module' => \Waffleboss\Library\Transformer\PaginatedCollections\Auth\ModulePaginatedCollection::class,
        'package' => \Waffleboss\Library\Transformer\PaginatedCollections\Auth\PackagePaginatedCollection::class,
        'report' => \Waffleboss\Library\Transformer\PaginatedCollections\Auth\ReportPaginatedCollection::class,
        'role' => \Waffleboss\Library\Transformer\PaginatedCollections\Auth\RolePaginatedCollection::class,
        'user' => \Waffleboss\Library\Transformer\PaginatedCollections\Auth\UserPaginatedCollection::class,
        'widget' => \Waffleboss\Library\Transformer\PaginatedCollections\Auth\WidgetPaginatedCollection::class,
    ],
    'log' => [
        'authentication_log' => \Waffleboss\Library\Transformer\PaginatedCollections\Log\AuthenticationLogPaginatedCollection::class,
        'feature_log' => \Waffleboss\Library\Transformer\PaginatedCollections\Log\FeatureLogPaginatedCollection::class,
        'widget_log' => \Waffleboss\Library\Transformer\PaginatedCollections\Log\WidgetLogPaginatedCollection::class,
        'report_log' => \Waffleboss\Library\Transformer\PaginatedCollections\Log\ReportLogPaginatedCollection::class,
    ],
    'system' => [
        'branch_type' => \Waffleboss\Library\Transformer\PaginatedCollections\System\BranchTypePaginatedCollection::class,
        'branch' => \Waffleboss\Library\Transformer\PaginatedCollections\System\BranchPaginatedCollection::class,
    ],
    'accounting' => [
        'trial_balance_account_group' => \Waffleboss\Library\Transformer\PaginatedCollections\Accounting\TrialBalanceAccountGroupPaginatedCollection::class,
        'profit_loss_account_group' => \Waffleboss\Library\Transformer\PaginatedCollections\Accounting\ProfitLossAccountGroupPaginatedCollection::class,
        'account_type' => \Waffleboss\Library\Transformer\PaginatedCollections\Accounting\AccountTypePaginatedCollection::class,
        'account' => \Waffleboss\Library\Transformer\PaginatedCollections\Accounting\AccountPaginatedCollection::class,
    ],
    'master' => [
        'unit' => \Waffleboss\Library\Transformer\PaginatedCollections\Master\UnitPaginatedCollection::class,
        'product_type' => \Waffleboss\Library\Transformer\PaginatedCollections\Master\ProductTypePaginatedCollection::class,
        'product_category' => \Waffleboss\Library\Transformer\PaginatedCollections\Master\ProductCategoryPaginatedCollection::class,
        'warehouse' => \Waffleboss\Library\Transformer\PaginatedCollections\Master\WarehousePaginatedCollection::class,
    ],
    'hrm' => [
        'address_type' => \Waffleboss\Library\Transformer\PaginatedCollections\Hrm\AddressTypePaginatedCollection::class,
        'attendance_type' => \Waffleboss\Library\Transformer\PaginatedCollections\Hrm\AttendanceTypePaginatedCollection::class,
        'blood_type' => \Waffleboss\Library\Transformer\PaginatedCollections\Hrm\BloodTypePaginatedCollection::class,
        'contact_type' => \Waffleboss\Library\Transformer\PaginatedCollections\Hrm\ContactTypePaginatedCollection::class,
        'division' => \Waffleboss\Library\Transformer\PaginatedCollections\Hrm\DivisionPaginatedCollection::class,
        'employee' => \Waffleboss\Library\Transformer\PaginatedCollections\Hrm\EmployeePaginatedCollection::class,
        'employee_address' => \Waffleboss\Library\Transformer\PaginatedCollections\Hrm\EmployeeAddressPaginatedCollection::class,
        'employee_assignment' => \Waffleboss\Library\Transformer\PaginatedCollections\Hrm\EmployeeAssignmentPaginatedCollection::class,
        'employee_mutation' => \Waffleboss\Library\Transformer\PaginatedCollections\Hrm\EmployeeMutationPaginatedCollection::class,
        'employee_contact' => \Waffleboss\Library\Transformer\PaginatedCollections\Hrm\EmployeeContactPaginatedCollection::class,
        'employee_photo' => \Waffleboss\Library\Transformer\PaginatedCollections\Hrm\EmployeePhotoPaginatedCollection::class,
        'employee_photo_type' => \Waffleboss\Library\Transformer\PaginatedCollections\Hrm\EmployeePhotoTypePaginatedCollection::class,
        'gender' => \Waffleboss\Library\Transformer\PaginatedCollections\Hrm\GenderPaginatedCollection::class,
        'job_title' => \Waffleboss\Library\Transformer\PaginatedCollections\Hrm\JobTitlePaginatedCollection::class,
    ],
];
