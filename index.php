<?php
/**
 * ---------------------------------------------------------------
 *  Bpjs Framework - Front Controller
 * ---------------------------------------------------------------
 *  Semua request masuk ke sini dan diteruskan ke Kernel.
 */
define('BPJS_START', microtime(true));
define('BPJS_VERSION','0.1.0');

// ---------------------------------------------------------------
//  Path Definition
// ---------------------------------------------------------------
$baseDir = realpath(__DIR__.'/');
define('BPJS_BASE_PATH',$baseDir);

// ---------------------------------------------------------------
//  Register The Composer Autoloader
// ---------------------------------------------------------------
require $baseDir . '/vendor/autoload.php';

// ---------------------------------------------------------------
//  Bootstrap The Application
// ---------------------------------------------------------------
$app = require $baseDir . '/bootstrap/app.php';

// ---------------------------------------------------------------
//  Handle The Incoming Request
// ---------------------------------------------------------------
$kernel = $app->make(\Bpjs\Core\Kernel::class);

$response = $kernel->handle(
    \Bpjs\Core\Request::capture()
);

$response->send();

$kernel->terminate();
