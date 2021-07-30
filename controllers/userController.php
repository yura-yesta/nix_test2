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
                $res = $userLogin->userAccount();
                $_SESSION['message'] = "Hello my dear {$res['name']} ";
                $_SESSION['user'] = $res;




                //var_dump($_SESSION['user']['login']);

                header('Location: /account');
            }else{
                session_start();
                $_SESSION['message'] = 'Something wrong. Please try again!';
                controller::$app->router->renderView('login');
            }
        }

    }
    public static function account(){
    $userAccount = new userLogin();

    session_start();
    if(!$_SESSION['user'] == false){
        controller::$app->router->renderView('account');
    }else{
        $_SESSION['message'] = 'please log in for enter account';
        header('Location: /login');
    }
   }
   public static function exitAccount(){
       session_start();
       session_unset();
       $_SESSION['message'] = 'Good-buy!  ';
       header('Location: /login');

   }
}