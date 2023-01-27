<?php

define('HOST', 'localhost');
define('DB', 'curso_helpdesk');
define('USER', 'root');
define('PASSWORD', "");
define('CHARSET', 'utf8mb4');


function ruta(string $asset)
{
    if ($asset === "login") {
        $ruta = "http://localhost/helpdesk/login";
        return $ruta;
    } else {
        return print("http://localhost/helpdesk/$asset");
    }
}
