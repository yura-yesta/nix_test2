<?php


namespace App\controllers;

use App\models\blog;

class blogController extends controller
{
    public static function blog()
    {
       controller::$app->router->renderView('blog','', (new blog)->gotBlog() );
    }
}