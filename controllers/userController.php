<?php


namespace App\controllers;


use App\models\userLogin;
use App\models\userRegister;

class userController extends controller
{
public static function register(){
    if(controller::$app->request->getMethod() === 'get'){
        controller::$app->router->renderView('register');
    }if(controller::$app->request->getMethod() === 'post'){
        $userRegister = new userRegister();
        $userRegister->loadData(controller::$app->request->getbody());

        if($userRegister->validate() && $userRegister->registerUser()){
            session_start();
            $_SESSION['message'] = 'Registration successful. Please login!';
            header('Location: /login');
        }else{
            session_start();
            $_SESSION['message'] = 'Something wrong. Please try again!';
            controller::$app->router->renderView('register');
            //header('Location: /register');
        }

    }

}
    public static function login(){
        if(controller::$app->request->getMethod() === 'get')
        {
            controller::$app->router->renderView('login');
        }if(controller::$app->request->getMethod() === 'post')
        {
            $userLogin = new userLogin();
            $userLogin->loadData(controller::$app->request->getbody());

            if($userLogin->validate() && $userLogin->checkUserGo()){
                session_start();
                $_SESSION['access'] = true;
                header('Location: /account');
            }else{
                session_start();
                $_SESSION['message'] = 'Something wrong. Please try again!';
                controller::$app->router->renderView('login');
            }
        }

    }
}