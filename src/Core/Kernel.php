<?php

namespace Bpjs\Core;
use Helpers\Api;
use Helpers\Route;

class Kernel
{
    protected array $middleware = []; // kamu bisa menambahkan middleware global di sini
    protected string $dispatcherType = 'web'; // default

    public function __construct(protected App $app)
    {
        // Peta semua route (web atau api) sesuai URL
        $this->mapRoutes();
    }

    protected function mapRoutes(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // hanya path dari URL
        $appBasePath = app_base_path();
        $cleanUri = preg_replace('#^' . preg_quote($appBasePath, '#') . '#', '', $uri);
        $cleanUri = '/' . ltrim($cleanUri, '/');

        $apiPrefix = '/api';

        if (str_starts_with($cleanUri, $apiPrefix)) {
            $this->dispatcherType = 'api';
            Api::init(api_prefix()); // ex: /bpjs-framework/api
            require BPJS_BASE_PATH . '/routes/api.php';
        } else {
            $this->dispatcherType = 'web';
            Route::init($appBasePath); // ex: /bpjs-framework
            require BPJS_BASE_PATH . '/routes/web.php';
        }
    }

    public function handle(Request $request): Response
    {
        foreach ($this->middleware as $middleware) {
            (new $middleware())->handle($request);
        }

        return match ($this->dispatcherType) {
            'web' => Route::dispatch(),
            'api' => Api::dispatch(),
            default => new \Bpjs\Core\Response('Dispatcher not found', 500)
        };
    }

    public function terminate(): void
    {
        // Bisa untuk logging, session cleanup, dsb.
    }

    public function addMiddleware(string $class): void
    {
        $this->middleware[] = $class;
    }
}
