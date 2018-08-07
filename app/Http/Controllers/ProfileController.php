<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Libs\Session;

class ProfileController extends Controller {

    public function getProfile ($userId) {

        $user = new User();

        $this->view->data = $user->data($userId);

        $this->view->render("user.profile");
    }

    public function getProfiles () {
        $user = new User();

        $this->view->data = $user->usersList();

        $this->view->render("user.profiles");
    }

}
