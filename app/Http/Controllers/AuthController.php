<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Libs\User as Auth;
use Libs\Http\Request;
use Libs\Translate;

class AuthController extends Controller {

    public function loginIndex () {
        $this->view->render("auth.login");
    }

    public function getLoginPost () {
        return $this->redirect("auth.login");
    }

    public function registerIndex () {
        $this->view->render("auth.register");
    }

    public function getRegisterPost () {
        if ($this->validation(Request::input(), [
                            "login" => ["required|alpha_num|unique:users|min_string:4|max_string:20", "Login"],
                            "password" => "required|min_string:4",
                            "password_again" => ["same:password", "Password again"],
                            "_token" => "token"
                        ])) {
            dd("ok");
        }
        $this->redirect("auth.register");
    }

}