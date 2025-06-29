<?php
// Request.php
namespace Bpjs\Core;

class Request {
    public static function capture(): static {
        return new static();
    }
}
