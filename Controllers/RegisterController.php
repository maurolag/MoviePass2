<?php

namespace Controllers;

require_once("BaseController.php");

use DAO\UserDAO as UserDAO;
use Exception;
use Models\User as User;

class RegisterController extends BaseController
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    public function Index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $this->ValidateData($_POST["email"]);
            $user = $this->ValidateData($_POST["user"]);
            $password = $this->ValidateData($_POST["password"]);
            $passwordConfirmed = $this->ValidateData($_POST["passwordConfirmed"]);
            $birthdate = $this->ValidateData($_POST["birthdate"]);
            $gender = $this->ValidateData($_POST["gender"]);

            $this->ValidateRegister($email, $user, $password, $passwordConfirmed, $birthdate);

            try {
                $password = BaseController::Hash($password); //hashing password
                $_SESSION['User'] = $this->userDAO->Register(new User($email, $user, $password, $birthdate, $gender));
                $_SESSION['isLoged'] = true;
                $this->ShowHomeView();
            } catch (Exception $e) {
                $this->View();
            }
        } else {
            $this->View();
        }
    }

    private function ValidateRegister($email, $user, $password, $passwordConfirmed, $birthdate)
    {
        if ($password !== $passwordConfirmed)
            $this->View("Las contraseñas no coinciden");

        if ($this->userDAO->SearchUserByEmail($email) != null)
            $this->View("Ese E-mail pertenece a un usuario existente");
    }

    public function View($alertMessage = "")
    {
        require_once(VIEWS_PATH . "RegisterView.php");
    }
}
