<?php
namespace Libs;
use Libs\Route;
use Libs\Http\Request;
use Libs\Middleware;

class App {

    public function __construct () {
        require_once(__ROOT__ . '/routes/web.php');
        $route = Route::getRoutes(Request::url());

        if (!$route) {
            die("404 Error");
        }

        if (isset($route["route"][1]["middleware"])) {
            foreach ($route["route"][1]["middleware"] as $midd) {
                Middleware::check($midd);
            }
        }

        $explodeToControllerName = explode("@", $route["route"][1]["uses"]);
        $this->controller = new $explodeToControllerName[0];
        call_user_func_array([$this->controller, $explodeToControllerName[1]], $route["params"]);
    }

}

