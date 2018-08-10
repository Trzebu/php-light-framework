<?php

namespace Libs;
use Libs\Str;
use Libs\Arr;

class TemplateCompiler {

    private $code = [];

    public function __construct ($path) {
        $this->code = explode("\n", file_get_contents($path));

        for ($i = 0; $i < count($this->code);) {

            $this->code[$i] = $this->removeSpace($this->code[$i]);

            if (strlen($this->code[$i]) == 1) {
                unset($this->code[$i]);
            } else {
                $i++;
            }

            $this->code = Arr::fixLowHigh($this->code);
        }

        print_r($this->code);
    }

    private function removeSpace ($str) {
        for ($j = 0; $j < strlen($str); $j++) {
            if ($str[$j] != " ") {
                break;
            }
            $str = ltrim($str, ' ');
        }
        return $str;
    }

}