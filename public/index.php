<?php
namespace App;


require_once __DIR__ . '/../vendor/autoload.php';


use App\controllers\blogController;
use App\controllers\controller;
use App\controllers\userController;
use Dotenv;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

//$config = [
////    'db' => [
//    'dsn'      => $_ENV['DB_DSN'],
//    'userController'    => $_ENV['DB_USER'],
//    'password'=> $_ENV['DB_PASSWORD']
////        ]
//];
//var_dump($config);
$app = new controller();
$app->router->get('/',  'web');
$app->router->get('/register',  [userController::class, 'register']);
$app->router->get('/login',  [userController::class, 'login']);
$app->router->get('/blog',  [blogController::class, 'blog']);


$app->run();

