<?php

namespace Controllers;

require_once("BaseController.php");

use DAO\UserDAO as UserDAO;
use Exception;
use Models\User as User;

use function PHPSTORM_META\type;

class HomeController extends BaseController
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    public function Index()
    {
        require_once(VIEWS_PATH."HomeView.php");
    }

    public function View($alertMessage = "")
    {
        require_once(VIEWS_PATH . "HomeView.php");
    }

}
