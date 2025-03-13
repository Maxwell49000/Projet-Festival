<?php

class Router
{

    private $controller;
    private $action;


    public function routes()
    {

        $this->controller = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'HomeController';
        // $this->action = isset($_GET['action']) ? $_GET['action'] : 'homeAction';
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'homeAction';




        require_once '../Controllers/' . $this->controller . '.php';


        $controller = new $this->controller();

        // Vérifier si la méthode existe dans le contrôleur, sinon utiliser 'error404'
        $method = method_exists($controller, $this->action) ? $this->action : 'error404';

        // Appeler la méthode du contrôleur
        $controller->$method();
    }
}
