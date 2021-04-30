<?php

return [
    'seed' => [
        'test_name' => env('TEST_NAME', 'Test'),
        'test_email' => env('TEST_EMAIL', 'user@chat.com'),
        'test_password' => env('TEST_PASSWORD', '123456'),
    ],
    'admin' => [
        'roles' => [
            'administrator' => 'administrator',
            'moderator' => 'moderator',
        ]
    ],

];
