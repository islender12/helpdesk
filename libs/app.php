<?php

class App
{
    public function __construct()
    {
        $url = $_GET['url'] ?? null;

        if (empty($url[0])) {
            $archivoController = 'controllers/login.php';
            require_once $archivoController;
            $controller = new Login();
            $controller->loadModel('login');
            $controller->VerificaUsuario();
            $controller->render();
        } else {
            // Eliminamos el ultimo '/' de la url
            $url = rtrim($url, '/');

            // Almacenamos la URL en forma de arreglo
            $url = explode('/', $url);
        }

        $archivoController = 'controllers/' . $url[0] . '.php';

        // Verificamos que exista el archivo controlador

        if (file_exists($archivoController)) {
            require_once $archivoController;
            $controller = new $url[0];
            $controller->render();
        } else {
            $archivoController = 'controllers/error-404.php';
            require_once $archivoController;
            $controller = new Error404();
        }
    }
}
