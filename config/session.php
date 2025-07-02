<?php

return [
    'driver' => env('SESSION_DRIVER', 'file'), // file, cookie, database (future)
    'lifetime' => env('SESSION_LIFETIME', 120),
    'expire_on_close' => false,
    'encrypt' => false,

    'http_only' => true,
    'secure' => env('SESSION_SECURE_COOKIE', false),
    'same_site' => 'lax',

    'storage_path' => BPJS_BASE_PATH . '/storage/session', // used by 'file' driver
];
