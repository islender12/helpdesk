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
            $controller->userLogin();
            $controller->render();
        } else {
            // Eliminamos el ultimo '/' de la url
            $url = rtrim($url, '/');

            // Almacenamos la URL en forma de arreglo
            $url = explode('/', $url);
            $archivoController = 'controllers/' . $url[0] . '.php';

            $nparam = count($url);
            // Verificamos que exista el archivo controlador

            if (file_exists($archivoController)) {
                require_once $archivoController;
                $controller = new $url[0];
                $controller->loadModel($url[0]);
                if ($url[0] === "login") {
                    $controller->userLogin();
                    $controller->render();
                } elseif ($nparam == 1 && $url[0] != "logout") {
                    $controller->render();
                } elseif ($nparam > 1 && method_exists($controller, $url[1])) {
                    if ($nparam > 2) {
                        $param = [];
                        for ($i = 2; $i < $nparam; $i++) {
                            array_push($param, $url[$i]);
                        }
                        $controller->{$url[1]}($param);
                    } else {
                        $controller->{$url[1]}();
                    }
                } else {
                    $archivoController = 'controllers/error-404.php';
                    require_once $archivoController;
                    $controller = new Error404();
                }
            } else {
                $archivoController = 'controllers/error-404.php';
                require_once $archivoController;
                $controller = new Error404();
            }
        }
    }
}
