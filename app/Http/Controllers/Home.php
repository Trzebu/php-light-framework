<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Libs\Http\Request;
use Libs\Translate;
use Libs\Config;

class Home extends Controller {

    public function index () {
        $this->view->lang_list = Config::get("langs", true);
        $this->view->render("home.index");
    }

    public function language () {
        Translate::changeLang(Request::input("lang"));
        $this->redirect("home.index");
    }

}
