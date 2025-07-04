<?php
namespace Helpers;

class View
{
    private static $data = [];
    private static $errorHandler;

    public static function set($key, $value)
    {
        self::$data[$key] = $value;
    }

    public static function setErrorHandler($callback)
    {
        self::$errorHandler = $callback;
    }

    public static function render($view, $data = [], $layout = null)
    {
        try{
            extract($data);
            $viewPath = BPJS_BASE_PATH . '/resources/views/' . $view . '.php';
            if (!file_exists($viewPath)) {
                throw new \Exception("View file not found: $viewPath");
            }
            ob_start();
            include $viewPath;
            $content = ob_get_clean();

            if ($layout) {
                $layoutPath = BPJS_BASE_PATH . '/resources/views/' . $layout . '.php';
                if (file_exists($layoutPath)) {
                    include $layoutPath;
                } else {
                    throw new \Exception("Layout file not found: $layoutPath");
                    // View::render('errors/500');
                }
            } else {
                echo $content;
            }
        } catch (\Exception $e){
            // self::renderError($e);
            if (!headers_sent()) { 
                http_response_code(500);
            }
            // self::renderError($e);
            ErrorHandler::handleException($e);
        }
        exit();
    }

    public static function renderToString($view, $data = [], $layout = null): string
    {
        extract($data);
        $viewPath = BPJS_BASE_PATH . '/resources/views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            throw new \Exception("View file not found: $viewPath");
        }

        ob_start();
        include $viewPath;
        $content = ob_get_clean();

        if ($layout) {
            $layoutPath = BPJS_BASE_PATH . '/resources/views/' . $layout . '.php';
            if (!file_exists($layoutPath)) {
                throw new \Exception("Layout file not found: $layoutPath");
            }

            // Layouts bisa akses variabel $content
            ob_start();
            include $layoutPath;
            return ob_get_clean();
        }

        return $content;
    }
    
    public static function error($view, $data = [], $layout = null)
    {
        try{
            extract($data);
            $viewPath = BPJS_BASE_PATH . '/app/handle/errors/' . $view . '.php';
            if (!file_exists($viewPath)) {
                throw new \Exception("View file not found: $viewPath");
            }
            ob_start();
            include $viewPath;
            $content = ob_get_clean();

            if ($layout) {
                $layoutPath = BPJS_BASE_PATH . '/app/handle/errors/' . $layout . '.php';
                if (file_exists($layoutPath)) {
                    include $layoutPath;
                } else {
                    throw new \Exception("Layout file not found: $layoutPath");
                    // View::render('errors/500');
                }
            } else {
                echo $content;
            }
        } catch (\Exception $e){
            // self::renderError($e);
            if (!headers_sent()) { 
                http_response_code(500);
            }
            // self::renderError($e);
            ErrorHandler::handleException($e);
        }
        exit();
    }

    public static function redirectTo($route, $flashData = [])
    {
        // Store flash data in session
        if (!empty($flashData)) {
            $_SESSION['flash_data'] = $flashData;
        }
        $fullroute = base_url() . $route;
        header("Location: $fullroute");
        exit();
    }

    public static function renderError($exception)
    {
        static $errorDisplayed = false;

        if (!$errorDisplayed) {
            $errorDisplayed = true;

            // Set response code menjadi 500
            if (!headers_sent()) { 
                http_response_code(500);
            }

            // Tampilkan halaman error
            $exceptionData = [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ];
            extract($exceptionData);
            include BPJS_BASE_PATH . '/app/handle/errors/view_404.php';
        }
        exit();
    }

    public static function path($view, $data = [], $layout = null)
    {
        extract($data);
        $viewPath = BPJS_BASE_PATH . '/resources/views/' . $view . '.php';
        if (!file_exists($viewPath)) {
            throw new \Exception("View file not found: $viewPath");
        }
        ob_start();
        include $viewPath;
        $content = ob_get_clean();

        if ($layout) {
            $layoutPath = BPJS_BASE_PATH . '/resources/views/' . $layout . '.php';
            if (!file_exists($layoutPath)) {
                throw new \Exception("Layout file not found: $layoutPath");
            }
            // inject $content into layout
            ob_start();
            include $layoutPath;
            return ob_get_clean(); // return full HTML
        }

        return $content; // return plain view
    }
}