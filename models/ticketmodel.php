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

    public function ListTicketUser($id)
    {
        try {

            if (!$id) {
                $query = $this->db->connect()->query("SELECT tk.id_ticket,tk.titulo_ticket,tk.descripcion_ticket,tk.fecha_creacion,cat.nombre_cat,us.nombre,us.id_user,us.apellido,tk.estado FROM tm_ticket tk INNER JOIN tm_categoria cat ON tk.id_categoria = cat.id_cat INNER JOIN tm_usuario us ON tk.id_usuario = us.id_user");
                $result = $query->fetchAll();
                return $result;
            } else {
                $query = $this->db->connect()->prepare("SELECT tk.id_ticket,tk.titulo_ticket,tk.descripcion_ticket,tk.fecha_creacion,cat.nombre_cat,us.nombre,us.id_user,us.apellido,tk.estado FROM tm_ticket tk INNER JOIN tm_categoria cat ON tk.id_categoria = cat.id_cat INNER JOIN tm_usuario us ON tk.id_usuario = us.id_user WHERE us.id_user = :id");
                $query->bindParam(':id', $id);
                $query->execute();
                $result = $query->fetchAll();
                return $result;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function DetalleTicket($id_ticket)
    {
        try {
            $query  = $this->db->connect()->prepare("SELECT dtk.id_detalletk,dtk.id_ticket,dtk.descripcion_ticket,dtk.fecha_creacion,cat.nombre_cat,us.nombre,us.apellido,r.rol FROM tm_detalle_ticket dtk INNER JOIN tm_usuario us ON dtk.id_usuariodt = us.id_user INNER JOIN roles r ON us.rol_user = r.id_rol inner JOIN tm_ticket tk ON tk.id_ticket = dtk.id_ticket  INNER JOIN tm_categoria cat ON cat.id_cat = tk.id_categoria WHERE dtk.id_ticket = :id_ticket");
            $query->bindParam(':id_ticket', $id_ticket);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
        }
    }

    // public function ObservarTickets()
    // {
    //     $query = $this->db->connect()->prepare("SELECT tk.id_ticket,tk.titulo_ticket,tk.descripcion_ticket,tk.fecha_creacion,cat.nombre_cat,us.nombre,us.id_user,us.apellido,tk.estado FROM tm_ticket tk INNER JOIN tm_categoria cat ON tk.id_categoria = cat.id_cat INNER JOIN tm_usuario us ON tk.id_usuario = us.id_user WHERE us.id_user = :id");
    //     $query->bindParam(':id', $id);
    //     $query->execute();
    //     $result = $query->fetchAll();
    //     return $result;
    // }
}
