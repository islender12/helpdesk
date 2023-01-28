<?php


class Ticket extends Controller
{

    public $categoria;

    public function __construct()
    {
        parent::__construct();
        $this->ListAllCategory();
    }

    public function render()
    {
        $this->view->render("ticket/consultarticket");
    }

    public function nuevoticket()
    {
        $this->view->render("ticket/nuevoticket");
    }
    public function ListAllCategory()
    {
        require 'models/categoriamodel.php';
        $this->categoria = new CategoriaModel();
        $this->view->categoria = $this->categoria->ListarCategorias();
    }
}
