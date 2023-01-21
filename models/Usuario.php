<?php

require './config/conexion.php';

class Usuario extends Conexion
{

    protected function login($email, $passwd)
    {
        $conexion = parent::conectar();
        $stmt = $conexion->prepare("SELECT * FROM tm_usuario WHERE email = :email AND passwd = :passwd AND estado = 1");
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->bindParam(':passwd',$passwd,PDO::PARAM_STR);
        $stmt->execute();
        return $result = $stmt->fetch();
    }

}
