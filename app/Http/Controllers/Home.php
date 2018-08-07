<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Libs\DataBase\DataBase as DB;
use Libs\Http\Request;
use Libs\Session;

class Home extends Controller {

    public function index () {
        $user = new User();
        $this->view->chuj = $user->id();
        $this->view->render("home.index");
    }

}