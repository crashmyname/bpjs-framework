<?php
use Bpjs\Framework\Core\App;
use Bpjs\Framework\Core\Cache;
use Bpjs\Framework\Core\FileCacheDriver;
use Bpjs\Framework\Core\Request;

/*
|--------------------------------------------------------------------------
| Validate Environment File
|--------------------------------------------------------------------------
*/
if (!file_exists(BPJS_BASE_PATH . '/.env')) {
    die('.env file not found.');
}

/*
|--------------------------------------------------------------------------
| Validate APP_KEY
|--------------------------------------------------------------------------
*/
if (empty(env('APP_KEY'))) {

    if (Request::isAjax()) {
        Response::json([
            'status' => 500,
            'message' => 'No application encryption key has been specified.'
        ], 500);
    }

    die("
        <html>
            <head>
                <title>Missing APP_KEY</title>
                <style>
                    body {
                        font-family: Arial;
                        background: #f8fafc;
                        padding: 40px;
                    }
                    .box {
                        background: white;
                        border-radius: 8px;
                        padding: 20px;
                        box-shadow: 0 0 10px rgba(0,0,0,.1);
                    }
                    code {
                        background:#eee;
                        padding:4px 8px;
                        border-radius:4px;
                    }
                </style>
            </head>
            <body>
                <div class='box'>
                    <h1>No application encryption key has been specified.</h1>
                    <p>Please run:</p>
                    <code>php bpjs generate:key</code>
                </div>
            </body>
        </html>
    ");
}

$app = new App();

$app->singleton(Bpjs\Framework\Core\Kernel::class, function () use ($app) {
    return new Bpjs\Framework\Core\Kernel($app);
});

Cache::init(
    new FileCacheDriver(BPJS_BASE_PATH . '/storage/cache')
);

return $app;
