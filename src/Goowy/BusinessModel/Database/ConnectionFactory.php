<?php

namespace Goowy\BusinessModel\Database;

use Slim\PDO\Database;

class ConnectionFactory
{
    private $DB_HOST = 'localhost';
    private $DB_NAME = 'goowy';
    private $DB_USERNAME = 'root';
    private $DB_PASSWORD = '4911697';
    private $DSN = 'mysql:host=localhost;dbname=goowy;charset=utf8';
    private static $factory;
    private $db;

    public static function getFactory()
    {
        if (!self::$factory)
            self::$factory = new ConnectionFactory();
        return self::$factory;
    }

    public function getConnection() {
        if (!$this->db)
            $this->db = new Database($this->DSN, $this->DB_USERNAME, $this->DB_PASSWORD);
        return $this->db;
    }
}