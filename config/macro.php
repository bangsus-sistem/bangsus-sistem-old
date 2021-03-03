<?php

return [
    'database' => [
        'blueprint' => [
            'register' => env('MACRO_DATABASE_BLUEPRINT_REGISTER', true),
        ]
    ],

    'validation' => [
        'rule' => [
            'prefix' => 'bsb_',
        ],
    ],
];
