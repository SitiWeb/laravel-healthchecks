
<?php

return [
    'channels' => [
        'healthchecks' => [
            'driver' => 'single',
            'path' => storage_path('logs/healthchecks.log'),
            'level' => 'info',
        ],
    ],
];
