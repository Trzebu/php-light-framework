<?php

namespace Libs\Console;

class Commands {

    public function create_table ($params) {

        print_r($params);
    }

    public function make_migration () {
        echo "make migration";
    }

    public function close () {
        exit();
    }

}