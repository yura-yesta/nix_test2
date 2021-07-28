<?php


namespace App\controllers;


use App\core\request;
use App\core\router;

class controller
{
    /**
     * @var controller
     */
    public static controller $app;
    /**
     * @var controller
     */

    public $router;
 public $request;

 public function __construct (){
     self::$app = $this;
     $this->request = new request();
     $this->router = new router($this->request);

 }
 public function run(){
     $this->router->resolve();
 }
}