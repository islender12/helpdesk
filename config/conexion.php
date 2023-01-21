<?php

// Usamos la Clase Conexion como Abstracta 
// Dicha clase solo será accesible desde clases que la hereden
abstract class Conexion{


    private $dsn = 'mysql:dbname=curso_helpdesk;host=localhost';
    private $user = 'root';
    private $passwd = '';

    protected function conectar(){

        try{

            $conexion = new PDO($this->dsn,$this->user,$this->passwd);
            return $conexion;

        }catch(PDOException $e){
            die("Ha Ocurrido Un Error Con El Servidor: ".$e->getMessage());
        }

    }

    public function ruta(){
        return "http://localhost/SistemaHelpDesk/";
    }

};
