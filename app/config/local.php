<?php
return [
        'db' => [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'port' => '3306',
            'database' => 'wp_ayso1ref',
            'username' => 'ayso1ref',
            'password' => 'M7O4Mv2ZNaeVLL4bPt2Q',
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => '',
            'options' => [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => true,
            ],
        ],

        'db_test' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'port' => '3307',
            'database' => 'wp_ayso1ref',
            'username' => 'ayso1ref',
            'password' => 'M7O4Mv2ZNaeVLL4bPt2Q',
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => '',
            'options' => [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => true,
            ],
        ],
];
