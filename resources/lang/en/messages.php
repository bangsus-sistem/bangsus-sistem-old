<?php

return [

    'rules' => [
        'auth' => [
            'role_is_deletable_rule' => [
                'role_has_user' => 'Role already assigned to User.'
            ]
        ]
    ],
];
