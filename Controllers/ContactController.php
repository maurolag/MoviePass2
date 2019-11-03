<?php

namespace Controllers;

require_once("BaseController.php");

use PHPMailer\Mail as Mail;


class ContactController extends BaseController
{


    public function Index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            
            $email = $this->ValidateData($_POST["Email"]);
            $name = $this->ValidateData($_POST["Name"]);
            $lastName = $this->ValidateData($_POST["LastName"]);
            $subject = $this->ValidateData($_POST["Subject"]);
            $description = $this->ValidateData($_POST["Description"]);

            Mail::SendContactMail($subject,$email,$name,$lastName,$description);

            $this->ShowHomeView();
        }
        else {
            $this->View();
        }
    }





    public function View($alertMessage = "")
    {
        require_once(VIEWS_PATH . "ContactView.php");
    }
}


?>