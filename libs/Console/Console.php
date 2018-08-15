<?php

namespace Libs\Console;
use Libs\Console\Commands;

class Console {

   private $_command = "";

    public function __construct () {
        if (PHP_OS == 'WINNT') {
            echo '$ ';
            $this->_command = stream_get_line(STDIN, 1024, PHP_EOL);
        } else {
            $this->_command = readline('$ ');
        }

        $this->run();

    }

    private function run () {
        $this->_command = "Libs\Console\Commands\\$this->_command";

        if (file_exists(__ROOT__ . "/" . $this->_command . ".php")) {
            $this->_command = new $this->_command(new Commands());
            $this->_command->execute();
        } else {
            con_log("Unknown command {$this->_command}.");
        }

        self::__construct();
    }

}