<?php
namespace Libs;
use Exception;
use Libs\Session;
use Libs\Validation\ValidationErrors;

class View {

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

        include $path;
    }

}