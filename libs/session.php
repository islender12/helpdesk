<?php
session_start();
class Session
{
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $rol_user;

    public function __construct()
    {
        $this->id = $_SESSION['user_id'] ?? '';
        $this->nombre = $_SESSION['nombre'] ?? '';
        $this->apellido = $_SESSION['apellido'] ?? '';
        $this->email = $_SESSION['email'] ?? '';
        $this->rol_user = $_SESSION['rol'] ?? '';
        $request = $_SERVER['REQUEST_URI'];
        $login = ['/helpdesk/login', '/helpdesk/'];
        if ($request == $login[0] || $request == $login[1]) {
            if (!empty($this->id)) {
                redirect("home");
            }
        } elseif (empty($this->id)) {
            redirect("login");
        }
    }
}
