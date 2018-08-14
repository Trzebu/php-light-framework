<?php

namespace Libs\Http;
use Libs\Session;

class Request {

    public function old ($name = null) {
        if ($name !== null) {
            if (is_array($name)) {
                Session::set("Request_old_inputs", $name);
            }
            if (Session::exists("Request_old_inputs")) {
                if (isset(Session::get("Request_old_inputs")[$name])) {
                    $data = Session::get("Request_old_inputs")[$name];
                    unset($_SESSION["Request_old_inputs"][$name]);
                    return $data;
                }
            }
        }
        return "";
    }

    public function input ($name = null) {
        if ($name !== null) {
            return isset($_POST[$name]) ? $_POST[$name] : null;
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
