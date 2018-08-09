<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Libs\Session;

final class ProfileController extends Controller {

    public function getProfile ($userId) {

        $user = new User();
        
        $this->view->data = $user->data($userId);
        $this->view->registered_at = $user->diffToHuman($this->view->data->created_at);

        $this->view->render("user.profile");
    }

    public function getProfiles () {
        $user = new User();

        $this->view->data = $user->usersList();

        $this->view->render("user.profiles");
    }

}