<?php

namespace Libs;
use Libs\Config;

class Translate {

    private static $_path = null;
    private static $_file = null;

    private static function openFile ($path) {

        if (self::$_path === null || self::$_path != $path) {
            self::$_path = $path;
            self::$_file = require_once($path);
            return self::$_file;
        }

        return self::$_file;

    }

    public static function get ($path) {
        $path = explode(".", $path);

        if (file_exists(__ROOT__ . Config::get("langs/" . Config::get("default_lang")) . "/" . $path[0] . ".php")) {
            $file = self::openFile(__ROOT__ . Config::get("langs/" . Config::get("default_lang")) . "/" . $path[0] . ".php");
            array_shift($path);

            foreach ($path as $bit) {
                if (isset($file[$bit])) {
                    $file = $file[$bit];
                }
            }

            return is_array($file) ? implode(".", $path) : $file;

        }
        return implode(".", $path);
    }

}