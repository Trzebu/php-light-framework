<?php
namespace Libs;
use Exception;
use Libs\Session;
use Libs\Validation\ValidationErrors;
use Libs\TemplateCompiler;
use Libs\Config;
use Libs\Str;

class View {

    public function flash ($name, $string = null) {
        return Session::flash($name, $string);
    }

    public function exists ($name) {
        return Session::exists($name);
    }

    public function render ($path) {
        $path = str_replace(".", "/", $path);
        try {
            if (!file_exists(__ROOT__ . Config::get("dirs/view") . "/" . $path . ".temp.php")) {
                Throw new Exception("Template {$path} not found.");
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
        $compile = new TemplateCompiler($path);

        require_once __ROOT__ . Config::get("dirs/compiled_templates") . "/" . Str::replace($path, ["/" => "."]) . ".ctemp.php";
    }

}