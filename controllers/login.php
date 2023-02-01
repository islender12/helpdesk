<?php

class Login extends Controller
{
    private $mensaje;
    private $email;
    function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->email = $this->email;
        $this->view->render("login/index");
    }

    public function VerificaUsuario()
    {
        if (isset($_POST['enviar'])) {
            $email = $_POST['email'] ?? '';
            $this->email = $email;
            $passwd = $_POST['passwd'] ?? '';
            if (empty($email) || empty($passwd)) {
                $this->view->mensaje = 'Asegurate de Rellenar Todos los Campos';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->view->mensaje = 'Asegurate de Ingresar Un Correo Valido';
            } else {

                $item = [
                    'email' => $email,
                    'passwd' => hash('sha512', $passwd)
                ];

                $usuario = $this->model->UserLogin($item);

                if (!empty($usuario->nombre)) {
                    $_SESSION['user_id'] = $usuario->id_user;
                    $_SESSION['nombre'] = $usuario->nombre;
                    $_SESSION['apellido'] = $usuario->apellido;
                    $_SESSION['email']  = $usuario->email;
                    $_SESSION['rol'] = $usuario->rol_user;
                    redirect("home");
                } else {
                    $this->view->mensaje = "Credenciales Incorrectas";
                }
            }
        }
    }
}
