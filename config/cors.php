<?php

return [
    'allow_all_origins' => false,

    'allowed_origins' => [
        'http://localhost:8000',
    ],

    'allowed_methods' => [
        'GET','POST','PUT','DELETE','OPTIONS'
    ],

    'allowed_headers' => [
        'Content-Type',
        'Authorization',
        'X-Requested-With',
        'X-CSRF-TOKEN',
    ],

    'allowed_credentials' => true,
];