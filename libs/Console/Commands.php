<?php

namespace Libs\Console;

class Commands {

    public function create_table () {

        echo "create_table";
    }

    public function make_migration () {
        echo "make migration";
    }

    public function close () {
        exit();
    }

}