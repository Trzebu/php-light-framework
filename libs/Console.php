<?php

namespace Libs;

class Console {

    private $_command = "";

    public function __construct () {
        if (PHP_OS == 'WINNT') {
            echo '$ ';
            $this->_command = stream_get_line(STDIN, 1024, PHP_EOL);
        } else {
            $this->_command = readline('$ ');
        }
    }

}