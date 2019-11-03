<?php

namespace Controllers;
use Models\Address as Address;
use DAO\City as City;
use DAO\UserDAO as UserDAO;
use Models\User as User;
require_once("BaseController.php");

class ProfileController extends BaseController
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
                             $this->ValidateData($_POST["UserName"]),
                             null,
                             $this->ValidateData($_POST["BirthDate"]),
                             $this->ValidateData($_POST["gender"]),
                             $_SESSION['User']['IdAddress']);

            try {
                $result = $this->userDAO->UpdateUser($user);
                $_SESSION['User'] = $result[0];
                $_SESSION['isLoged'] = true;
                $this->ShowHomeView();
            } catch (Exception $e) {
                $this->View();
            }
        } else {
            $this->View();
        }
    }


}
?>