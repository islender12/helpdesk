<?php


class Database
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;


    public function __construct()
    {

        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');
    }

    public function connect()
    {
        try {

            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            // Cuando se usa una conexión PDO a MySQL los prepared statements de verdad puede que no se utilicen por defecto. 
            // Para usarlos siempre, hay que desactivar la emulación de prepared statements
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            print_r("Ha Ocurrido Un Error" . $e->getMessage());
            die();
        }
    }
}
