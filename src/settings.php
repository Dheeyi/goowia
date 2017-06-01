<?php
return [
    'settings' => [
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
            'blade_template_path' => '../templates/views', // String or array of multiple paths
            'blade_cache_path'    => '../templates/cache', // Mandatory by default, though could probably turn caching off for development
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
            'database' => 'goowia',
            'username' => 'root',
            'password' => 'sample',
            'collation' => 'utf8_general_ci',
            'prefix' => ''
        ],
    ],
];
