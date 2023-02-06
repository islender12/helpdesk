<?php


class Ticket extends Controller
{

    public $categoria;
    private $mensaje;
    public $ticket;
    private $id_ticket;
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        // $this->ListarTicket();
        $this->view->render("ticket/consultarticket");
    }

    public function nuevoticket()
    {
        $this->ListAllCategory();
        $this->view->render("ticket/nuevoticket");
    }

    public function RegistarTicket()
    {
        if (empty($_POST['categoria']) || empty($_POST['titulo']) || empty($_POST['descripcion'])) {
            echo "Asegurate de Rellenar Todos Los Campos";
        } else {
            if ($this->model->InsertTicket([
                'id_usuario' => $this->session->id,
                'id_categoria' => $this->cleanhtml($_POST['categoria']),
                'titulo_ticket' => $this->cleanhtml($_POST['titulo']),
                'descripcion_ticket' => $this->cleanhtml($_POST['descripcion'])
            ])) {
                echo "insert";
            } else {
                echo "error";
            }
        }
    }

    public function ListarTicket()
    {

        if (intval($this->session->rol_user) === 2) {
            $datos = $this->model->ListTicketUser(null);
        } else {
            $datos = $this->model->ListTicketUser($this->session->id);
        }
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row['id_ticket'];
            $sub_array[] = $row['nombre_cat'];
            $sub_array[] = $row['titulo_ticket'];
            if ($row['estado']) {
                $sub_array[] = '<span class="label label-pill label-success">Abierto</span>';
            } else {
                $sub_array[] = '<span class="label label-pill label-danger">Cerrado</span>';
            }
            $sub_array[] = date("d/m/Y H:i:s", strtotime($row['fecha_creacion']));
            $sub_array[] = '<button type="button" class="btn btn-sm btn-outline-primary btn-icon" onclick="verdetalleticket(' . $row['id_ticket'] . ')" id="' . $row['id_ticket'] . '"> <div><i class="fa fa-eye"></i></div></button>';
            $data[] = $sub_array;
        }

        $results = [
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        ];

        echo json_encode($results);
    }

    public function verDetalleTicket($id_ticket)
    {
        $detalle = $this->model->DetalleTicket($id_ticket[0]);
        $this->view->detalleticket = $detalle;
        $this->view->render('ticket/detalleticket');
    }

    public function ListAllCategory()
    {
        require 'models/categoriamodel.php';
        $this->categoria = new CategoriaModel();
        $this->view->categoria = $this->categoria->ListarCategorias();
    }
}
