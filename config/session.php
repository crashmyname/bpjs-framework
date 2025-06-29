<?php

return [
    'lifetime' => env('SESSION_LIFETIME', 120),
    'http_only' => true,
    'secure' => env('SESSION_SECURE_COOKIE', false),
    'same_site' => 'lax',
];