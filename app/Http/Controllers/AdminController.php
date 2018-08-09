<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Libs\Token;
use Libs\Session;

final class AdminController extends Controller {

    public function index () {
        $this->view->render("admin.index");
    }

    public function getUserDelete () {
        $user = new User();
        $this->view->users_list = $user->usersList();
        $this->view->render("admin.user_delete");
    }

    public function userDelete ($token, $userId) {
        if (Token::check("user_delete_link", $token)) {
            $user = new User();
            if ($user->data($userId) !== null) {
                Session::flash("user_delete_success", "User {$user->data($userId)->login} has been deleted succesfuly!");
                $user->deleteUser($userId);
            }
        }
        return $this->redirect("admin.user_delete");
    }

}
