<?php

namespace Libs\DataBase;
use PDO;
use Error;
use Exception;
use PDOException;
use Libs\Config;
use Countable;

class DataBase implements Countable {

    private static $_instance = null;
    private $_pdo;
    private $_count = 0;
    protected $_table = null;
    private $_where = "";
    private $_values = [];
    private $_getValues = [];
    private $_query = null;
    private $_results = [];

    public function __construct () {
        try {
            $this->_pdo = new PDO(Config::get("DataBase/driver") . ':host=' . 
                                  Config::get("DataBase/host") . ';dbname=' . 
                                  Config::get("DataBase/db_name"), 
                                  Config::get("DataBase/username"), 
                                  Config::get("DataBase/password"));
            $this->_pdo->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
            $this->_pdo->query("SET CHARSET utf8");
            $this->reset();
        } catch (PDOException $error) {
            die($error->getMessage());
        }
    }

    public static function instance () {
        // if (!isset(self::$_instance)) {
        //     self::$_instance = new DataBase();
        // }

        return new DataBase();
    }

    public function query ($sql, $bindBefore = []) {
        if ($this->_query = $this->_pdo->prepare($sql)) {
            $i = 1;

            if (count($bindBefore) > 0) {
                foreach ($bindBefore as $value) {
                    $this->_query->bindValue($i, $value);
                    $i++;
                }
            }

            if (count($this->_values) > 0) {
                foreach ($this->_values as $value) {
                    $this->_query->bindValue($i, $value);
                    $i++;
                }
            }

            if($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } else {
                if (Config::get("debug")) {
                    $this->debug();
                }
            }
        }
        return $this;
    }

    public function where ($argument, $operator, $value) {
        $operators = ["=", "!=", "<", ">", "<=", ">="];
        try {
            if ($this->_table === null) {
                die("First you must set table!");
            }
            if ($argument && $operator && $value !== false) {
                if (in_array($operator, $operators)) {
                    $this->_where .= $this->operatorGrammar($argument, $operator);
                    array_push($this->_values, $value);
                    return $this;
                } else {
                    Throw new Error("Uncorrect operator: {$operator}.");
                }
            } else {
                Throw new Error("Too few arguments for method where.");
            }
        } catch (Error $error) {
            die($error->getMessage());
        }
    }

    private function queryBuilder ($command) {
        $sql = $command;

        if (count($this->_getValues) > 0) {
            $sql .= " " . implode(",", $this->_getValues);
        }

        $sql .= " FROM {$this->_table}";

        if (strlen($this->_where) > 0) {
            $sql .= " WHERE {$this->_where}";
        }

        return $this->query($sql);
    }

    public function update ($values) {
        $sql = "UPDATE {$this->_table} SET ";
        $params = [];
        $update_values = [];

        foreach ($values as $key => $value) {
            array_push($params, $key . "=?");
            array_push($update_values, $value);
        }

        $sql .= implode(",", $params);
        $sql .= " WHERE " . $this->_where;
        echo $sql;
        return $this->query($sql, $update_values);
    }

    public function insert ($fields) {
        $keys = array_keys($fields);
        $values = "";
        $i = 1;

        foreach ($fields as $field) {
            $values .= '?';

            if ($i < count($fields)) {
                $values .= ', ';
            }

            array_push($this->_values, $field);
            $i++;
        }

        $sql = "INSERT INTO {$this->_table} (`".implode('`, `', $keys)."`) VALUES ({$values})";

        return $this->query($sql);
    }

    public function lastInsertedID () {
        return $this->_pdo->lastInsertId();
    }
    
    public function delete () {
        $this->queryBuilder("DELETE");
        return $this;
    }

    public function results () {
        $this->reset();
        return $this->_results;
    }

    public function first () {
        if ($this->_count > 0) {
            $this->reset();
            return $this->_results[0];
        }
        return false;
    }

    public function get ($params = ["*"]) {
        $this->_getValues = $params;
        $this->queryBuilder("SELECT");
        return $this;
    }

    public function table ($table) {
        $this->_table = $table;
        return $this;
    }

    public function or ($argument, $operator, $value) {
        $this->_where .= " OR ";
        $this->where($argument, $operator, $value);
        return $this;
    }

    public function and ($argument, $operator, $value) {
        $this->_where .= " AND ";
        $this->where($argument, $operator, $value);
        return $this;
    }

    private function operatorGrammar ($argument, $operator) {
        if ($operator == "!=") {
            return $argument . " NOT IN (?)";
        } else {
            return $argument . $operator . "?";
        }
    }

    private function reset () {
        $this->_where = "";
        $this->_values = [];
        $this->_getValues = [];
    }

    public function count () {
        return $this->_count;
    }

    public function debug() {
        print_r($this->_query->errorInfo());
        die();
    }

}