<?php
namespace App\core;

use App\controllers\userController;

class router
{
    protected array $routes = [];
    public Request $request;

    /**
     * Router constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;


    }
    public function post($path, $callback){
        $this->routes['post'][$path] = $callback;


    }
    public function resolve(){
        $path = $this->request->getPath();
        //var_dump($path);
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        //var_dump($callback);
        if($callback === false){
            http_response_code(404);
            //echo 'not found';
            echo $this->renderView('_404');
            exit;
        }
        if(is_string($callback)){
            return $this->renderView($callback);

        }

        call_user_func($callback);

    }

    public function renderView(string $view, $params = [], $data = [] )
    {
        //$layoutContent = $this->layoutContent($view);
        //$viewContent = $this->renderOnlyView($view);
        //$res = include_once __DIR__."/../views/layouts/main.php";
        //echo str_replace('World', 1488, $res);
//        include_once __DIR__."/../views/$view.php";
        $viewContent = $this->renderOnlyView($view,$params, $data );
        $layoutContent = $this->layoutContent();
        echo  str_replace('{{content}}', $viewContent, $layoutContent );



    }

    protected function layoutContent()
    {
        ob_start();
        require "../views/layouts/main.php";
        return   ob_get_clean();


//         return include_once Application::$ROOT_DIR."/views/layouts/main.php";
//         //return ob_get_contents();


    }
    protected function renderOnlyView($view, $params = [], $data = [])
    {
        if ($params){
            foreach ($params as $key => $value){
               ( $$key = $value);

            }
        }
        $data = $data;
        ob_start();

        require "../views/$view.php";
        return ob_get_clean();
    }
}