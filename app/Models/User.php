<?php
namespace App\Models;
use Libs\Model;

class User extends Model {
    
    protected $_table = "users";

    public function id () {
        return $this->where("id", "=", 6)->get(["name"])->first()->name;
    }

}