<?php

namespace App\controllers;


use App\core\dataBase;
use App\core\request;
use App\core\router;

class controller
{
    /**
     * @var controller
     */
    public static controller $app;
    public Database $db;
    public $router;
    public $request;

    public function __construct ($config)
    {
        self::$app = $this;
        $this->request = new request();
        $this->router = new router($this->request);
        $this->db = new dataBase($config);
    }

    public function run()
    {
        $this->router->resolve();
    }
}