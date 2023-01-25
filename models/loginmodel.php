<?php

class LoginModel extends Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function UserLogin($item)
    {

        $query = $this->db->connect()->prepare("SELECT * FROM tm_usuario WHERE email = :email AND passwd = :passwd");
        try {
            $query->execute([
                ':email' => $item['email'],
                ':passwd' => $item['passwd']
            ]);

            $result = $query->fetch(PDO::FETCH_OBJ);

            return $result;
        } catch (PDOException $e) {
            die();
        }
    }
}
