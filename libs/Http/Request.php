<?php

namespace Libs\Http;

class Request {

    public function input ($name = null) {
        if ($name !== null) {
            return $_POST[$name];
        }
        return $_POST;
    }

    public static function method ($method) {
        if ($_SERVER["REQUEST_METHOD"] === $method) {
            return true;
        }
        return false;
    }

    public static function clientIP () {
        return $_SERVER['REMOTE_ADDR'];
    }

    public static function userAgent () {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    public static function getMethod () {
        return $_SERVER["REQUEST_METHOD"];
    }
    
    public static function url () {
        return $_SERVER['REQUEST_URI'];
    }

}