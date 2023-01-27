<?php

class Controller
{
    public $view;
    public $model;
    public $session;
    public function __construct()
    {
        $this->session = new Session();
        $this->view = new View();
    }

    public function loadModel($model)
    {
        $url = 'models/' . $model . 'model.php';
        if (file_exists($url)) {
            require $url;
            $modelName = $model . 'Model';
            $this->model = new $modelName;
        }
    }

    public function back()
    {
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        header("Location: " . ruta($url[0]));
    }
}
