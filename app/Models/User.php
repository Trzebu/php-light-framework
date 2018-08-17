<?php
namespace App\Models;
use Libs\Model;
use Libs\Session;
use Libs\User as Auth;

class User extends Model {
    
    protected $_table = "users";

    public function usersList () {
        return $this->get(["id", "login"])->count() > 0 ? $this : null;
    }

    public function data ($id = null) {

        if ($id === null) {
            return Auth::data();
        }

        return $this->where("id", "=", intval($id))->get()->count() > 0 ? $this->first() : null;
    }

    public function create ($fields) {
        $this->insert($fields);
    }

    public function deleteUser ($id = null) {
        $id = $id === null ? Auth::data()->id : $id;
        $this->where("id", "=", $id)->delete();
    }

}