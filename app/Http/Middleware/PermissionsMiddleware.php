<?php

/*
|--------------------------------------------------------------------------
| Middleware groups: Permissions
|--------------------------------------------------------------------------
|
| Here is detected that user have a special permissions.
|
*/

namespace App\Http\Middleware;
use Libs\User;
use Libs\Http\Redirect;

class AuthMiddleware {

    private $_allowed_groups = [ //here you can add more groups with permit.
        "admin",
        "moderator",
    ]

    public function __construct () {
        $has_permission = false;
        foreach ($this->$_allowed_groups as $allowed) {
            if (User::permissions($allowed)) {
                $has_permission = true;
            }
        }

        if (!$has_permission) {
            Redirect::to("home.index");
        }

    }

}