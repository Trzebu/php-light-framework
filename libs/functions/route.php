<?php
use Libs\Route;
use Libs\Config;

function route ($routeName, $params = []) {
    if (Route::getRouteUrl($routeName)) {
        $path = Route::getRouteUrl($routeName);

        if (count($params) > 0) {
            foreach ($params as $key => $value) {
                $path = str_replace("{" . $key . "}", $value, $path);
            }
        }

        return Config::get("host") . $path;
    }

    return null;
}