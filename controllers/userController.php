<?php


namespace App\controllers;

use App\models\userChangeInfo;
use App\models\userLogin;
use App\models\userRegister;

class userController extends controller
{
    public static function register()
    {
        session_start();
        if(controller::$app->request->getMethod() === 'get')
        {
            if($_SESSION['user'] == false) {
                controller::$app->router->renderView('register');
            }
            else {
                controller::$app->router->renderView('account');
            }
        }
        if(controller::$app->request->getMethod() === 'post') {
            $userRegister = new userRegister();
            $userRegister->loadData(controller::$app->request->getbody());
            if($userRegister->validate() && $userRegister->registerUser()) {
                $_SESSION['message'] = 'Registration successful. Please login!';
                header('Location: /login');
            }
            else {
                $_SESSION['message'] = 'Something wrong. Please try again!';
                controller::$app->router->renderView('register');
            }
         }
    }

    public static function login()
    {
        session_start();
        if(controller::$app->request->getMethod() === 'get') {
            if($_SESSION['user'] == false) {
                controller::$app->router->renderView('login');
            }
            else {
                controller::$app->router->renderView('account');
            }
        }
            if(controller::$app->request->getMethod() === 'post') {
                $userLogin = new userLogin();
                $userLogin->loadData(controller::$app->request->getbody());
                if($userLogin->validate() && $userLogin->checkUserGo()) {
                    $res = $userLogin->userAccount();
                    $_SESSION['message'] = "Hello my dear {$res['name']} ";
                    $_SESSION['user'] = $res;
                    header('Location: /account');
                }
            else {
                $_SESSION['message'] = 'Something wrong. Please try again!';
                controller::$app->router->renderView('login');
            }
        }
    }

    public static function account()
    {
        session_start();
        if(!$_SESSION['user'] == false) {
            if(controller::$app->request->getMethod() === 'post') {
                $userChangeInfo = new userChangeInfo();
                $userChangeInfo->loadData(controller::$app->request->getbody());
                if($userChangeInfo->validate() && $userChangeInfo->changeUserInfo($_SESSION['user']['id'])) {
                    session_start();
                    $_SESSION['message'] = 'Success! Information changed. New personal information will available after re-login.';
                }
                else {
                    $_SESSION['message'] = 'Something go wrong. Please try again.';
                }
            }
            controller::$app->router->renderView('account');
        }
        else {
            $_SESSION['message'] = 'please log in for enter account';
            header('Location: /login');
        }
   }

   public static function exitAccount()
   {
       session_start();
       session_unset();
       $_SESSION['message'] = 'Good-buy!  ';
       header('Location: /login');
   }

   public static function changeInfo ()
   {
        if(controller::$app->request->getMethod() === 'post') {
            if (isset($_FILES)) {
                if (userLogin::changeLogo()) {
                    session_start();
                    $_SESSION['message'] = 'Success';
                    header('Location: /account');
                }
                else {
                    session_start();
                    $_SESSION['message'] = 'Something is wrong while loading the image. Try again please.';
                    header('Location: /account');
                }
            }
        }
   }
}
