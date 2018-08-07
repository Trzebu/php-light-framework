<?php

namespace Libs\Validation;
use Libs\Session;

class ValidationErrors {

    private $_errors = null;
    private $_currentError = null;

    public function __construct () {

        if (Session::exists("validation_errors")) {
            $this->_errors = Session::flash("validation_errors");
        }

    }

    public function input ($input) {
        if (!$this->hasError()) {
            return "";
        }
        return $this->_errors["inputs"][$input];
    }

    public function all () {
        if (!$this->hasError()) {
            return null;
        }
        $errors = [];
        foreach ($this->_errors["errors"] as $error) {
            if ($error[0] == $this->_currentError) {
                array_push($errors, $error[1]);
            }
        }

        return $errors;
    }

    public function first () {
        if (!$this->hasError()) {
            return null;
        }
        foreach ($this->_errors["errors"] as $error) {
            if ($error[0] == $this->_currentError) {
                return $error[1];
            }
        }
    }

    public function allErrors () {
        if (!$this->hasError()) {
            return null;
        }
        $errors = [];
        foreach ($this->_errors["errors"] as $error) {
            array_push($errors, $error[1]);
        }
        return $errors;
    }

    public function getErrors ($input = null) {
        if ($this->hasError()) {
            if ($input !== null) {
                foreach ($this->_errors["errors"] as $error) {
                    if ($error[0] == $input) {
                        $this->_currentError = $input;
                        return $this;
                    }
                }
            }
            return $this->errors["errors"];
        }
        return false;
    }

    public function hasError ($input = null) {
        if ($this->_errors !== null) {
            if ($input === null) {
                return true;
            }
            foreach ($this->_errors["errors"] as $error) {
                if ($error[0] == $input) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function set ($errors, $postData) {
        Session::flash("validation_errors", [
            "errors" => $errors,
            "inputs" => $postData
        ]);
    }

}