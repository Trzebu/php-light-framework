<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Libs\TemplateCompiler;

final class Test extends Controller {

    public function index () {

        $chuj = new TemplateCompiler(__ROOT__ . "/resources/view/test/index.temp.php");

    }

}