<?php
namespace DataBase\Migrations;
use Libs\DataBase\TableCreator;


/**
* Run the migrations.
*
* Auto created at: {data}
*
* PHP Light Framework Migration File.
*
*/

class Create{upper_table_name}Table extends TableCreator {

    protected $tableName = "{table_name}";

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