<?php



class View
{
    public $mensaje;
    public $email;
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
