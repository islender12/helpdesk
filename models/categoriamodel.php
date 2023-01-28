<?php

class CategoriaModel extends Model
{

    public $id;
    public $nombre_cat;
    public $estado;

    public function __construct()
    {
        parent::__construct();
    }

    public function ListarCategorias()
    {
        $query = $this->db->connect()->prepare("SELECT * FROM tm_categoria WHERE estado = 1");
        try {
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException) {
            return false;
        }
    }
}
