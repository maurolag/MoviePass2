<?php

namespace Controllers;

require_once("BaseController.php");

use DAO\UserDAO as UserDAO;
use Exception;
use PHPMailer\Mail as Mail;
use Models\User as User;

use function PHPSTORM_META\type;

class UserController extends BaseController
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    #region: LOGIN
    public function LoginHandler()
    {
        $user = $this->ValidateData($_POST["user"]);
        $password = $this->ValidateData($_POST["pass"]);

        try {
            //TODO: ENCRIPTAR PASSWORD ANTES DE COMPARARLA CON LA DE LA BD
            $selectedUser = $this->userDAO->LogIn($user, $password);

            if ($selectedUser != null) {
                $this->ShowHomeView();
            } else {
                $this->ShowLoginView("Email o contraseña incorrecta");
            }
        } catch (Exception $e) {
            $this->ShowLoginView("Ha ocurrido un error al intentar iniciar sesion");
        }
    }

    public function LogInWithFacebookHandler()
    {
        require_once(FACEBOOK_PATH);
        //$a = 'a';
        //require_once('../FacebookLogIn/index.php');
        //require_once(FACEBOOK_PATH . "Config.php");


        //echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
    }

    public function RecoverPassword()
    {
        $email = $this->ValidateData($_POST["email"]);

        try {
            $selectedUser = new User(null, null, null, null, null, null);
            $selectedUser = $this->userDAO->SearchUserByEmail($email);

            if ($selectedUser != null) {
                $selectedUser['NewPassword'] = $this->userDAO->UpdateUserPassword($email, $this->CreateRandomNumber(10));
                if (Mail::SendNewPassword($email, $selectedUser[0]["UserName"], $selectedUser["NewPassword"])) {
                    $this->ShowLoginView("Hemos enviado una nueva contraseña a su email, luego puede cambiarla en 
                    configuraciones al iniciar sesión si asi lo desea");
                } else {
                    $this->ShowLoginView("Ha ocurrido un error al enviar la nueva contraseña");
                }
            } else {
                $this->ShowLoginView("Ese email no pertenece a ningun usuario registrado en MoviePass");
            }
        } catch (Exception $e) {
            $this->ShowLoginView("Ha ocurrido un error al intentar recuperar la contraseña");
        }
    }

    public function ShowForgotPasswordView()
    {
        require_once(VIEWS_PATH . "ForgotPasswordView.php");
    }

    public function ShowLoginView($alertMessage = "")
    {
        require_once(VIEWS_PATH . "LoginView.php");
    }

    #endregion

    #region REGISTER

    public function RegisterHandler()
    {
        $email = $this->ValidateData($_POST["email"]);
        $user = $this->ValidateData($_POST["user"]);
        $password = $this->ValidateData($_POST["password"]);
        $passwordConfirmed = $this->ValidateData($_POST["passwordConfirmed"]);
        $birthdate = $this->ValidateData($_POST["birthdate"]);
        $gender = $this->ValidateData($_POST["gender"]);

        $this->ValidateRegister($email, $user, $password, $passwordConfirmed, $birthdate);

        try {
            $this->userDAO->Register(new User($email, $user, $password, $birthdate, $gender, null));
            $this->ShowRegisterView();
        } catch (Exception $e) {
            $this->ShowRegisterView();
            die("Error: " . $e->getMessage());
        }
    }

    private function ValidateRegister($email, $user, $password, $passwordConfirmed, $birthdate)
    {
        if ($password !== $passwordConfirmed)
            $this->ShowRegisterView("Las contraseñas no coinciden");

        if ($this->userDAO->SearchUserByEmail($email) != null)
            $this->ShowRegisterView("Ese E-mail pertenece a un usuario existente");
    }

    public function ShowRegisterView($alertMessage = "")
    {
        require_once(VIEWS_PATH . "RegisterView.php");
    }
    #endregion

    public function ShowHomeView()
    {
        //TODO: LLEVAR A LA PAGINA DE INICIO
        echo "Estoy en el home";
    }
}
