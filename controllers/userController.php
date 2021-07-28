<?php


namespace App\controllers;


class userController extends controller
{
public static function register(){
        controller::$app->router->renderView('register');
}
    public static function login(){
        controller::$app->router->renderView('login');
    }
}