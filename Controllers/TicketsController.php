<?php

namespace Controllers;


use DAO\TicketsDAO as TicketsDAO;

class TicketsController 
{
    private $ticketDAO;

    public function __construct()
    {
        $this->ticketDAO = new TicketsDAO();
    }

    public function View(){
        $this->LoadOrders();
    }

    private function LoadOrders(){
        $Orders = $this->ticketDAO->LoadOrders($_SESSION['User']['IdUser']);
        require_once(VIEWS_PATH . "TicketsView.php");
    }
}
