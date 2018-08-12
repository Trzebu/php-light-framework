<?php

namespace Libs;
use Libs\Str;
use Libs\Arr;

class TemplateCompiler {

    private $_code = [];
    private $_includes = [];

    public function __construct ($path) {
        $this->startCompile($path);
        print_r($this->_code);
    }

    private function startCompile ($path) {
        $this->_code = explode("\n", file_get_contents($path));
        $this->cleareCode();
        $this->compile();
    }

    private function compile () {
        for ($i = 0; $i < count($this->_code); $i++) {

            if (strpos($this->_code[$i], "@") !== false) {
                $command = ltrim($this->_code[$i], "@");
                $params = explode(" ", $command);
                $command = $params[0];
                array_shift($params);

                switch ($command) {
                    
                }

            }

        }
    }

    private function cleareCode () {
        for ($i = 0; $i < count($this->_code);) {

            $this->_code[$i] = $this->removeSpace($this->_code[$i]);

            if (strlen($this->_code[$i]) == 1) {
                unset($this->_code[$i]);
            } else {
                $i++;
            }

            $this->_code = Arr::fixLowHigh($this->_code);
        }
    }

    private function removeSpace ($str) {
        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] != " ") {
                break;
            }
            $str = ltrim($str, " ");
        }
        return $str;
    }

    

}