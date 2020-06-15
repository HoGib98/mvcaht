<?php
namespace App;

class Router
{

    static public function parse($url, &$request)
    {
        $url = trim($url);

        if ($url == "/")
        {
            $request->controller = "App\Controllers\TasksController";
            $request->action = "index";
            $request->params = [];
        }
        else
        {
            
            $explode_url = explode('/', $url);
            $request->controller = "App\\Controllers\\" . ucfirst($explode_url[1]) . "Controller";
            $request->action = $explode_url[2];
            $request->params = array_slice($explode_url, 3);
        }

    }
}
