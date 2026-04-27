<?php
use Bpjs\Framework\Core\App;
use Bpjs\Framework\Core\Cache;
use Bpjs\Framework\Core\FileCacheDriver;

$app = new App();

$app->singleton(Bpjs\Framework\Core\Kernel::class, function () use ($app) {
    return new Bpjs\Framework\Core\Kernel($app);
});

Cache::init(
    new FileCacheDriver(BPJS_BASE_PATH . '/storage/cache')
);

return $app;
