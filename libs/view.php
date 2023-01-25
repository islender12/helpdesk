<?php



class View
{
    public $mensaje;
    public $email;
    public function render($vista)
    {
        require 'views/' . $vista . '.php';
    }
}
