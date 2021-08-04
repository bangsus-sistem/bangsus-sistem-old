<?php

return [
    'auth' => [
        'role' => \Waffleboss\Library\Observers\Auth\RoleObserver::class,
        'user' => \Waffleboss\Library\Observers\Auth\UserObserver::class,
    ],
    'system' => [
        'branch_type' => \Waffleboss\Library\Observers\System\BranchTypeObserver::class,
        'branch' => \Waffleboss\Library\Observers\System\BranchObserver::class,
    ],
    'accounting' => [
        'account' => \Waffleboss\Library\Observers\Accounting\AccountObserver::class,
    ],
    'hrm' => [
        'employee' => \Waffleboss\Library\Observers\Hrm\EmployeeObserver::class,
        'employee_assignment' => \Waffleboss\Library\Observers\Hrm\EmployeeAssignmentObserver::class,
    ],
];
