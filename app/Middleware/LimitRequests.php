<?php
namespace Middlewares;

use Bpjs\Core\Request;
use Bpjs\Core\Response;

class LimitRequests
{
    public function handle(Request $request)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $uri = $_SERVER['REQUEST_URI'];
        $key = md5($ip . $uri);

        $limit = $request->getRateLimit() ?? 60; // default 60 requests
        $interval = 60; // per 60 detik

        if (!isset($_SESSION['rate_limit'])) {
            $_SESSION['rate_limit'] = [];
        }

        $currentTime = time();

        if (!isset($_SESSION['rate_limit'][$key])) {
            $_SESSION['rate_limit'][$key] = [
                'count' => 1,
                'start_time' => $currentTime
            ];
        } else {
            $data = $_SESSION['rate_limit'][$key];

            if (($currentTime - $data['start_time']) < $interval) {
                if ($data['count'] >= $limit) {
                    http_response_code(429);
                    die("⚠️ Too Many Requests. Limit is $limit per $interval seconds.");
                }

                $_SESSION['rate_limit'][$key]['count']++;
            } else {
                $_SESSION['rate_limit'][$key] = [
                    'count' => 1,
                    'start_time' => $currentTime
                ];
            }
        }
    }
}
