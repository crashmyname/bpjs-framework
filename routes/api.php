<?php

use Helpers\Api;
use Helpers\Response;

Api::get('/', function () {
    return Response::json(['message' => 'Dengan slash'], 200);
});

Api::get('/test', function () {
    return Response::json(['message' => 'Ini /test'], 200);
});
