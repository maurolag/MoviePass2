<?php

namespace Controllers;
use Models\Address as Address;
use DAO\City as City;
use DAO\UserDAO as UserDAO;
use Models\User as User;
use Util\Validate as Validate;
use Controllers\HomeController as HomeController;


class ProfileController 
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    public function View(){
        require_once(VIEWS_PATH . "ProfileView.php");
    }

    public function Index(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = new User($_SESSION['User']['Email'],
                             Validate :: ValidateData($_POST["UserName"]),
                             null,
                             Validate :: ValidateData($_POST["BirthDate"]),
                             Validate :: ValidateData($_POST["gender"]),
                             $_SESSION['User']['IdAddress']);

            try {
                $result = $this->userDAO->UpdateUser($user);
                $_SESSION['User'] = $result[0];
                $_SESSION['isLoged'] = true;
                HomeController :: Index();
            } catch (Exception $e) {
                $this->View();
            }
        } else {
            $this->View();
        }
    }


}
?>