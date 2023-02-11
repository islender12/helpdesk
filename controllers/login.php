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

    public function Login()
    {
        if (isset($_POST['enviar'])) {

            $data = [
                'email' => $email = $_POST['email'] ?? '',
                'password' =>  $passwd = $_POST['passwd'] ?? ''
            ];

            if ($this->isEmpty($data)) {
                $this->view->mensaje = 'Asegurate de Rellenar Todos los Campos';
            } elseif ($this->isEmail($email)) {
                $this->view->mensaje = 'Asegurate de Ingresar Un Correo Valido';
            } else {

                $item = [
                    'email' => $email,
                    'passwd' => hash('sha512', $passwd)
                ];

                $this->VerificaUsuario($item);
            }
        }
    }

    private function VerificaUsuario(array $item)
    {
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

    private function isEmail(string $email): bool
    {
        return (!filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    private function isEmpty(array $data): bool
    {
        $this->email = $data['email'];
        return (empty($data['email']) || empty($data['password']));
    }
}
