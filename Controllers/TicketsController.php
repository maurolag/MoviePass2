<?php

namespace Controllers;
require_once("BaseController.php");

class TicketsController extends BaseController
{
    public function View(){
        require_once(VIEWS_PATH . "TicketsView.php");
    }
}
?>