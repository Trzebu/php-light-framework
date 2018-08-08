<?php

$GLOBALS = [
    "constants" => [
        "debug" => true,
        "host" => "http://localhost",
        "default_lang" => "en",
        "langs" => [
            "en" => ["/resources/lang/en", "English"],
            "pl" => ["/resources/lang/pl", "Polski"]
        ],
        "dirs" => [
            "resources" => "/resources",
            "view" => "/resources/view",
        ],
        "DataBase" => [
            "driver" => "mysql",
            "host" => "localhost",
            "db_name" => "forum", 
            "username" => "root",
            "password" => "",
        ]
    ]
];