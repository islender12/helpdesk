<?php

require './models/Usuario.php';

class UsuarioController extends Usuario
{

    public $message;

    public function VerificaUsuario($email, $passwd)
    {


        if (empty($email) || empty($passwd)) {
            $this->message = 'Asegurate de Rellenar Todos los Campos';
        } else {
            
            $usuario = parent::login($email, $passwd);

            if (!$usuario) {
                $this->message = 'Credenciales Incorrectos';
            }else{
                echo "Bienvenido: ".$usuario['nombre'];
            }
        }
    }

    public function getMessage()
    {
        return $this->message;
    }
}

$usuario = new UsuarioController;

if (isset($_POST['enviar'])) {

    $email = trim(htmlspecialchars($_POST['email'])) ?? "";
    $passwd = trim(htmlspecialchars($_POST['passwd'])) ?? "";
    $usuario->VerificaUsuario($email, $passwd);
}
