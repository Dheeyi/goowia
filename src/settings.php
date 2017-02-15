<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // Database connection settings
        "db" => [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'database' => 'goowy',
            'username' => 'root',
            'password' => '4911697',
            'collation' => 'utf8_general_ci',
            'prefix' => ''
        ],
    ],
];
