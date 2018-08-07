<?php

namespace App\Http\Controllers;
use Libs\View;
use Libs\Token;
use Libs\Validation\Validation;
use Libs\Validation\ValidationErrors;
use Libs\Session;

class Controller {

    public function __construct () {
        $this->view = new View();
        $this->view->token = new Token();
        $this->view->errors = new ValidationErrors();
    }

    protected function validation ($post, $filters) {
        $validation = new Validation($post, $filters);

        if ($validation->errors() !== null) {
            ValidationErrors::set($validation->errors(), $post);
        }

        return $validation->check();
    }

    protected function redirect ($path) {
        return header("Location: " . route($path));
    }

}