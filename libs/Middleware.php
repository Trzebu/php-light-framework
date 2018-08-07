<?php

namespace Libs;
use Libs\User;
use Libs\Http\Redirect;

class Middleware {

    public function check ($middleware) {

        switch ($middleware) {
            case "guest":
                self::guest();
            break;
            case "auth":
                self::auth();
            break;
        }

    }

    private static function guest () {
        if (User::check()) {
            Redirect::to("home.index");
        }
    }

    private static function auth () {
        if (!User::check()) {
            Redirect::to("home.index");
        }
    }

}