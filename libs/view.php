<?php



class View
{
    public $mensaje;
    public $email;
    public $categoria;
    private $session;
    public function __construct()
    {
        $this->session = new Session();
    }
    public function render($vista)
    {
        require 'views/' . $vista . '.php';
    }
}
