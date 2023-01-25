<?php

define('HOST', 'localhost');
define('DB', 'curso_helpdesk');
define('USER', 'root');
define('PASSWORD', "");
define('CHARSET', 'utf8mb4');


function ruta(string $asset)
{
    return print("http://localhost/SistemaHelpDesk/$asset");
}
