<?php

return [
    'auth' => [
        'role' => \Waffleboss\Library\Models\Auth\Role::class,
        'user' => \Waffleboss\Library\Models\Auth\User::class,
    ],
    'system' => [
        'branch_type' => \Waffleboss\Library\Models\System\BranchType::class,
        'branch' => \Waffleboss\Library\Models\System\Branch::class,
    ],
    'hrm' => [
        'employee' => \Waffleboss\Library\Models\Hrm\Employee::class,
        'employee_assignment' => \Waffleboss\Library\Models\Hrm\EmployeeAssignment::class,
    ],
];
