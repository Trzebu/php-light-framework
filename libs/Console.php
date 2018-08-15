<?php

namespace Libs;
use Libs\Str;

class Console {

    private $_command = "";

    public function __construct () {
        if (PHP_OS == 'WINNT') {
            echo '$ ';
            $this->_command = stream_get_line(STDIN, 1024, PHP_EOL);
        } else {
            $this->_command = readline('$ ');
        }

        $this->execute();

    }

    private function execute () {
        $params = explode(" ", $this->_command);
        $command = $params[0];
        array_shift($params);

        switch ($command) {
            case "create_table":
                if (isset($params[0])) {
                    echo "Creating Data Base file template: {$params[0]}\n";
                    $template = file_get_contents(__ROOT__ . "/libs/DataBase/CreateTableTemplate.php");
                    $template = Str::replace($template, ["{upper_table_name}" => ucfirst($params[0])]);
                    $template = Str::replace($template, ["{table_name}" => $params[0]]);
                    $template = Str::replace($template, ["{data}" => date("Y-m-d H:i:d")]);
                    $path = __ROOT__ . "/database/migrations/Create" . ucfirst($params[0]) . "Table.php";
                    if (!file_exists($path)) {
                        $file = fopen($path, 'c');
                        fwrite($file, $template);
                        fclose($file);
                        echo "File created in {$path}\n";
                    } else {
                        echo ucfirst($params[0]) . " table scheme already exists.";
                    }
                } else {
                    echo "To few arguments for function create_table!";
                }
            break;
            case "make_migration":
                echo "Making Data Base migration...\n";
                $path = __ROOT__ . "/database/migrations";
                if (is_dir($path)) {
                    $files = scandir($path);
                    
                    foreach ($files as $file) {
                        if ($file[0] != ".") {
                            $file = explode(".", $file);
                            $file = "database\migrations\\$file[0]";
                            echo "Running {$file} migration\n";
                            $class = new $file;
                            $class->create();
                        }
                    }

                } else {
                    echo "Data base migration dir no exists!";
                }
            break;
            default:
                echo "Unknown command!";
        }

    }

}