<?php
return [
    'base_url' => env('HEALTHCHECKS_URL', 'https://hc-ping.com/'),
    'ping_key' => env('HEALTHCHECKS_PING_KEY'),
    'create_new' => env('HEALTHCHECKS_CREATE_NEW', false),
];
