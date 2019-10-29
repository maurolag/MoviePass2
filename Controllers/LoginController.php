<?php

namespace Controllers;

require_once("BaseController.php");

use DAO\UserDAO as UserDAO;
use Exception;
use PHPMailer\Mail as Mail;
use Models\User as User;

use function PHPSTORM_META\type;

class LoginController extends BaseController
{
    private $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    #region: LOGIN
    public function Index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $this->ValidateData($_POST["user"]);
            $password = $this->ValidateData($_POST["pass"]);

            try {
                $password = BaseController::Hash($password);
                $selectedUser = $this->userDAO->LogIn($user, $password);

                if ($selectedUser != null) {
                    $_SESSION['User'] = $selectedUser[0];                  
                    $_SESSION['isLogged'] = true;
                    $this->ShowHomeView();
                } else {
                    $this->View("Email o contraseña incorrecta");
                }
            } catch (Exception $e) {
                $this->View("Ha ocurrido un error al intentar iniciar sesion");
            }
        } else {
            $this->View();
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
            $selectedUser = new User(null, null, null, null, null);
            $selectedUser = $this->userDAO->SearchUserByEmail($email);
            $newPassword = $this->CreateRandomNumber(10);

            if ($selectedUser != null) {
                if (Mail::SendNewPassword($email, $selectedUser[0]["UserName"], $newPassword)) {
                    $this->View("Hemos enviado una nueva contraseña a su email, luego puede cambiarla en 
                    configuraciones al iniciar sesión si asi lo desea");
                } else {
                    $this->ShowForgotPasswordView("Ha ocurrido un error al enviar la nueva contraseña");
                }
                $selectedUser['NewPassword'] = $this->userDAO->UpdateUserPassword($email, BaseController::Hash($newPassword));
            } else {
                $this->ShowForgotPasswordView("Ese email no pertenece a ningun usuario registrado en MoviePass");
            }
        } catch (Exception $e) {
            $this->ShowForgotPasswordView("Ha ocurrido un error al intentar recuperar la contraseña");
        }
    }

    public function ShowForgotPasswordView($alertMessage = "")
    {
        require_once(VIEWS_PATH . "ForgotPasswordView.php");
    }

    public function View($alertMessage = "")
    {
        require_once(VIEWS_PATH . "LoginView.php");
    }

    public function Logout(){
        session_destroy();
        $this->View();  
    }

}
