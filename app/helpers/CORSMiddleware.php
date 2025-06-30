<?php
namespace Helpers;

class CORSMiddleware
{
    public static function handle()
    {
        
        $config = require BPJS_BASE_PATH.'/../config/cors.php';
        $origin = $_SERVER['HTTP_ORIGIN'] ?? '';
        $headers = getallheaders();

        if($config['allow_all_origins']){
            header("Access-Control-Allow-Origin: *");
        } elseif(in_array($origin,$config['allowed_origins'])){
            header("Access-Control-Allow-Origin: $origin");
             if ($config['allow_credentials']) {
                header("Access-Control-Allow-Credentials: true");
            }
        } else {
            header("HTTP/1.1 403 Forbidden");
            echo json_encode(['error' => 'Origin not allowed']);
            exit();
        }

        // Izinkan metode HTTP tertentu
        header("Access-Control-Allow-Methods: ". implode(',',$config['allowed_methods']));

        // Izinkan header tertentu
        header("Access-Control-Allow-Headers: ". implode(',',$config['allowed_headers']));

        // Izinkan penggunaan credentials (seperti cookies)
        header("Access-Control-Allow-Credentials: ". ($config['allowed_credentials'] ? 'true' : 'false'));

        // Untuk permintaan OPTIONS (pre-flight), kirim respons 200 dan hentikan eksekusi skrip
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            header("HTTP/1.1 200 OK");
            exit();
        }
    }
}