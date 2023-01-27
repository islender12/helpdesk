<?php


class Ticket extends Controller
{


    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render("ticket/consultarticket");
    }

    public function nuevoticket(){
        $this->view->render("ticket/nuevoticket");
    }
}
