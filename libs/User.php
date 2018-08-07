<?php

namespace Libs;
use Libs\Session;
use Libs\DataBase\DataBase;
use Libs\Cookie;

class User {

    private static $_data = null;

    public function logout () {
        Session::unset("u_id");
        Cookie::delete("remember_token");
        return true;
    }

    public function login ($fields, $password = null, $remember = null) {
        $db = DataBase::instance()->table("users");
        $i = 0;

        foreach ($fields as $key => $value) {
            if ($i == 0) {
                $db->where($key, "=", $value);
            } else {
                $db->and($key, "=", $value);
            }
            $i++;
        }

        if ($db->get()->count() == 0) {
            return false;
        }

        $db = $db->first();

        if ($password !== null) {
            if (!password_verify($password, $db->password)) {
                return false;
            }
        }

        if ($remember !== null) {
            $token = md5(uniqid());

            DataBase::instance()->where("id", "=", $db->id)->update([
                "remember_me" => $token
            ]);

            Cookie::put("remember_token", $token, 2592000);

        }

        Session::set("u_id", $db->id);
        return true;

    }

    public function data () {
        if (self::check()) {
            if (self::$_data === null) {
                self::$_data = DataBase::instance()->table("users")->where("id", "=", Session::get("u_id"))->get()->first();
            }
            return self::$_data;
        }
    }

    public function check () {
        return (bool) Session::exists("u_id");
    }

}