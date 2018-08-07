<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Libs\DataBase\DataBase as DB;
use Libs\Http\Request;
use Libs\Session;

class Home extends Controller {

    public function index () {
        $this->view->render("home.index");
    }

}