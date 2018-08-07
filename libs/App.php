<?php
namespace Libs;
use Libs\Route;
use Libs\Http\Request;

class App {

    public function __construct () {
        require_once(__ROOT__ . '/routes/web.php');
        $route = Route::getRoutes(Request::url());

        if (!$route) {
            die("404 Error");
        }

        $explodeToControllerName = explode("@", $route["route"][1]["uses"]);
        $this->controller = new $explodeToControllerName[0];
        call_user_func_array([$this->controller, $explodeToControllerName[1]], $route["params"]);
    }

}

