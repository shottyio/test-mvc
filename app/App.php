<?php

namespace App;

class App
{
    protected $controller = 'home';

    protected $action = 'index';

    public function run()
    {
        $path = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($path[1])) $this->controller = $path[1];

        $controller = $this->controller($this->controller);

        if (!empty($path[2])) $this->action = $path[2];

        $this->action($controller, $this->action);
    }

    public function controller($class)
    {
        $controller = 'App\\Controllers\\' . ucfirst($class . 'Controller');

        if (!class_exists($controller)) throw new \Exception('Controller not exists');

        return new $controller;
    }

    public function action($controller, $action)
    {
        return $controller->$action();
    }
}