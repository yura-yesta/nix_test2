<?php
namespace App;


require_once __DIR__ . '/../vendor/autoload.php';
use App\controllers\hello;
use Dotenv;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
//    'db' => [
    'dsn'      => $_ENV['DB_DSN'],
    'user'    => $_ENV['DB_USER'],
    'password'=> $_ENV['DB_PASSWORD']
//        ]
];
var_dump($config);

(new controllers\hello)->hello();
echo 'hello';