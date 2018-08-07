<?php
spl_autoload_register( function ($class) {

    $filename = __ROOT__ . '\\' . $class . '.php';

    try {
        if (!file_exists($filename)) {
            Throw new Exception("Class {$filename} not found.");
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }

    include $filename;
    return true;

});

require_once(__ROOT__ . '/config/config.php');
require_once(__ROOT__ . '/libs/functions/route.php');
require_once(__ROOT__ . '/libs/functions/dd.php');

$app = new Libs\App;

