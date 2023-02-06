<?php



class View
{
    // Propiedades que estamos pasando a la vista
    public $mensaje;
    public $email;
    public $categoria;
    public $detalleticket;
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
