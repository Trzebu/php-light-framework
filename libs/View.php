<?php
namespace Libs;
use Exception;
use Libs\Session;
use Libs\Validation\ValidationErrors;

class View {

    public function flash ($name, $string = null) {
        return Session::flash($name, $string);
    }

    public function exists ($name) {
        return Session::exists($name);
    }

    public function render ($path) {
        $path = str_replace(".", "/", $path);
        $path = __ROOT__ . "/resources/view/" . $path . ".php";
        try {
            if (!file_exists($path)) {
                Throw new Exception("Template {$path} not found.");
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }

        require_once $path;
    }

}