<?php


namespace App\controllers;


class blogController extends controller
{
public static function blog(){
    controller::$app->router->renderView('blog');
}
}