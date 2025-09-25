<?php

namespace Bpjs\Core;

use Helpers\View;

class App
{
    protected array $bindings = [];

    public function singleton(string $abstract, callable $concrete)
    {
        $this->bindings[$abstract] = $concrete($this);
    }

    public function make(string $abstract)
    {
        if (!isset($this->bindings[$abstract])) {
            if (env('APP_DEBUG') == 'false') {
                if (Request::isAjax() || (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)) {
                    header('Content-Type: application/json', true, 500);
                    echo json_encode([
                        'statusCode' => 500,
                        'error'      => 'Internal Server Error'
                    ]);
                } else {
                    return View::error(500);
                }
                exit;
            }
            throw new \Exception("Service {$abstract} tidak terdaftar.");
        }
        return $this->bindings[$abstract];
    }
}
