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
                $command = trim($params[0]);
                array_shift($params);
                $line = $i;
                echo $command, $line, "\n";
                switch ($command) {
                    case "include":
                        $this->includes($line, $params);
                    break;
                    case "if":
                        $this->if($line, $params);
                    break;
                    case "elseif":
                        $this->elseif($line, $params);
                    break;
                    case "else":
                        $this->else($line);
                    break;
                    case "endif":
                        $this->endif($line);
                    break;
                    case "foreach":
                        $this->foreach($line, $params);
                    break;
                    case "endforeach":
                        $this->endforeach($line, $params);
                    break;
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
            $str = rtrim($str, " ");
            $str = ltrim($str, " ");
        }
        return $str;
    }

    //*******All statment*************

    private function endforeach ($line) {
        $this->_code[$line] = "<?php endforeach; ?>";
    }

    private function foreach ($line, $params) {
        $this->_code[$line] = "<?php foreach(" . implode(" ", $params) . "): ?>";
    }

    private function endif ($line) {
        $this->_code[$line] = "<?php endif; ?>";
    }

    private function else ($line) {
        $this->_code[$line] = "<?php else: ?>";
    }

    private function elseif ($line, $params) {
        $this->_code[$line] = "<?php elseif(" . implode(" ", $params) . "): ?>";
    }

    private function if ($line, $params) {
        $this->_code[$line] = "<?php if(" . implode(" ", $params) . "): ?>";
    }

    private function includes ($line, $params) {
        if (count($params) > 1) {
            die("Error in compilation. Wrong parametr for include.");
        }

        $params = Str::replace($params[0], ["/" => "."]);
        $this->_code[$line] = "<?php require_once({$params} . \".ctemp.php\"); ?>";
        array_push($this->_includes, $params);
    }

}
