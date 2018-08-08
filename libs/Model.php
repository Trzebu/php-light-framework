<?php
namespace Libs;
use Libs\DataBase\DataBase;
use Libs\TimeConverter;

class Model extends DataBase {

    protected $_table = null;

    public function __construct () {
        parent::__construct();
    }

    public function diffToHuman ($time) {
        return TimeConverter::diffToHuman($time);
    }

}