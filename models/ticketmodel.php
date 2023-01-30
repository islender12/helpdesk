<?php

class TicketModel extends Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function InsertTicket($datos)
    {
        try {
            $query = $this->db->connect()
                ->prepare("INSERT INTO tm_ticket (id_usuario,id_categoria,titulo_ticket,descripcion_ticket)
                       VALUES (:id_usuario,:id_categoria,:titulo_ticket,:descripcion_ticket)");
            $query->bindParam(':id_usuario', $datos['id_usuario'], PDO::PARAM_INT);
            $query->bindParam(':id_categoria', $datos['id_categoria'], PDO::PARAM_INT);
            $query->bindParam(':titulo_ticket', $datos['titulo_ticket']);
            $query->bindParam(':descripcion_ticket', $datos['descripcion_ticket']);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function ListAllTicket()
    {
        try {
            $query = $this->db->connect()->query("SELECT tk.id_ticket,tk.titulo_ticket,tk.descripcion_ticket,cat.nombre_cat,us.nombre,us.apellido,tk.estado FROM tm_ticket tk INNER JOIN tm_categoria cat ON tk.id_categoria = cat.id_cat INNER JOIN tm_usuario us ON tk.id_usuario = us.id_user WHERE tk.estado = 1");
            return $query->fetch();
        } catch (PDOException $e) {
            return false;
        }
    }
    public function ListTicketUser($id)
    {
        try {
            $query = $this->db->connect()->prepare("SELECT tk.id_ticket,tk.titulo_ticket,tk.descripcion_ticket,cat.nombre_cat,us.nombre,us.id_user,us.apellido,tk.estado FROM tm_ticket tk INNER JOIN tm_categoria cat ON tk.id_categoria = cat.id_cat INNER JOIN tm_usuario us ON tk.id_usuario = us.id_user WHERE us.id_user = :id AND tk.estado = 1");
            $query->bindParam(':id', $id);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }
}
