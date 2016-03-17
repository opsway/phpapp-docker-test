<?php

return [
    'db' => [
        'driver'   => 'Pdo',
        'dsn'      => $_ENV['MYSQL_DSN'],
        'database' => $_ENV['MYSQL_DATABASE'],
        'user'     => $_ENV['MYSQL_PASSWORD'],
        'password' => $_ENV['MYSQL_USER']
    ],
];