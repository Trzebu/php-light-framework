<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Libs\User as Auth;
use Libs\Http\Request;
use Libs\Translate;
use Libs\Session;

final class AuthController extends Controller {

    public function loginIndex () {
        $this->view->render("auth.login");
    }

    public function getLoginPost () {

        if ($this->validation(Request::input(), [
            "login" => "required",
            "password" => "required",
            "_token" => "token"
        ])) {
            if (Auth::login([
                "login" => Request::input("login"),
            ], Request::input("password"), Request::input("remember"))) {
                Session::flash("info", "You are now signed in.");
            } else {
                Session::flash("info", "Could not sign you in with those details.");
            }
        }

        return $this->redirect("auth.login");
    }

    public function registerIndex () {
        $this->view->render("auth.register");
    }

    public function getRegisterPost () {
        if ($this->validation(Request::input(), [
            "login" => ["required|alpha_num|unique:users|min_string:4|max_string:20", "Login"],
            "password" => "required|min_string:4",
            "password_again" => ["same:password", "password again"],
            "rule" => ["accepted", "rules"],
            "_token" => "token"
        ])) {
            $user = new User();
            $user->create([
                "login" => Request::input("login"),
                "password" => password_hash(Request::input("password"), PASSWORD_DEFAULT)
            ]);
            Session::flash("info", "Your account has been created and you can now sign in.");
        }

        $this->redirect("auth.register");
    }

    public function logout () {
        Auth::logout();
        $this->redirect("home.index");
    }

}