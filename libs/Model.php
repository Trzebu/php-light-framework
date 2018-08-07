<?php
namespace Libs;
use Libs\DataBase\DataBase;

class Model extends DataBase {

    protected $_table = null;

    public function __construct () {
        parent::__construct();
    }

}