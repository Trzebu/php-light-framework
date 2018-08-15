<?php

namespace Libs\DataBase;
use Libs\DataBase\DataBase;
use Exception;

class TableCreator extends DataBase {

    protected $tableName = null;

    public function __construct () {
        parent::__construct();
    }

    protected function exists () {
        try {
            $result = $this->_pdo->query("SELECT 1 FROM {$this->tableName} LIMIT 1");
        } catch (Exception $e) {
            return false;
        }

        return (bool) $result !== false;

    }

}