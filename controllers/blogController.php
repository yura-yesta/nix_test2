<?php


namespace App\controllers;


use App\models\blog;

class blogController extends controller
{
public static function blog(){
    $blog = new blog();
    $blog = $blog->selectBlog('blogs');

    controller::$app->router->renderView('blog',$blog,$blog );
}
}