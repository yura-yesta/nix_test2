<?php


namespace App\core;

class dataBase
{
    public $PDO;

    /**
     * Database constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->PDO = new \PDO($config['dsn'], $config['user'], $config['password']);
        $this->PDO->setAttribute(\PDO::ATTR_ERRMODE , \PDO::ERRMODE_EXCEPTION);
    }
}