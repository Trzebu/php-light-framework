<?php
namespace DataBase\Migrations;
use Libs\DataBase\TableCreator;


/**
* Run the migrations.
*
* Auto created at: 2018-08-15 12:46:15
*
* PHP Light Framework Migration File.
*
*/

class CreateUsersTable extends TableCreator {

    protected $tableName = "users";

    public function create () {

        /**
         * Checking that table exists.
         *
         * @return bool
         */

        if ($this->exists()) {
            return;
        }

        //Table fields

    }

}