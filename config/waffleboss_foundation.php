<?php

return [
    'http' => [
        'request' => [
            'feature' => [
                'model' => \Waffleboss\Library\Models\Auth\Feature::class,
            ],
            'widget' => [
                'model' => \Waffleboss\Library\Models\Auth\Widget::class,
            ],
            'report' => [
                'model' => \Waffleboss\Library\Models\Auth\Report::class,
            ],
        ],
    ],
    'macro' => [
        'register' => [
            'blueprints' => true,
            'rules' => true,
        ],
        'kernel' => \Waffleboss\Library\Macro\Kernel::class,
        'config' => [
            'rule' => [
                'prefix' => 'wbl',
            ],
        ],
    ],
    'observer' => [
        'kernel' => [
            \Waffleboss\Library\Observers\Kernel::class,
            \Waffleboss\Library\Observers\Kernel::class
        ],
    ],
];
