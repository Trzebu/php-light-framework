<?php
namespace DataBase\Migrations;
use Libs\DataBase\TableCreator;


/**
* Run the migrations.
*
* Auto created at: 2018-08-15 12:47:15
*
* PHP Light Framework Migration File.
*
*/

class CreateTestTable extends TableCreator {

    protected $tableName = "test";

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