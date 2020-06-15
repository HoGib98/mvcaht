<?php
namespace App;


class Dispatcher
{

    /**
     * @var
     */
    private $request;

    /**
     *
     */
    public function dispatch()
    {

        $this->request = new Request();
        
        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    /**
     * @return mixed
     */
    public function loadController()
    {
        $name = $this->request->controller;

        $controller = new $name();

        return $controller;
    }

}
