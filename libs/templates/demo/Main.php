<?php

namespace Libs\Templates\Demo;
use App\Http\Controllers\Controller;

final class Main extends Controller {

    public function index () {
        require_once(__ROOT__ . "/libs/templates/demo/index.php");
    }

}