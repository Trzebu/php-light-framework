<?php
namespace DataBase\Migartions;
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

    protected $table = "{table_name}";

    public function create () {
        if ($this->exists()) {
            return;
        }

        //Table fields

    }

}