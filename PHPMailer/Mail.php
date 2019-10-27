<?php
namespace PHPMailer;
require_once 'PHPMailer.php';
require_once 'SMTP.php';
require_once 'Exception.php';

use Controllers\BaseController as BaseController;
use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    private static function InitMail($destinationMail){
        $mail = new PHPMailer();
        
        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = 'ssl://smtp.gmail.com:465'; //tls://smtp.gmail.com:587
        $mail->SMTPAuth = true;
        $mail->Username = 'InfoMoviePass@gmail.com';
        $mail->Password = 'MoviePassThe1';
        $mail->Port = '465'; //587
        $mail->SMTPSecure = 'ssl'; //tls

        //EMAIL Settings
        $mail->isHTML(true);
        $mail->setFrom('no-reply-info.moviepass@gmail.com');
        $mail->addAddress($destinationMail);

        return $mail;
    }

    public static function SendConfirmationCode($name, $destinationMail)
    {
        $mail = InitEmail($destinationMail);
        $confirmationCode = BaseController::CreateRandomNumber(20);
        
        $mail->Subject = 'Bienvenido a MoviePass ' . $name . '!';
        $mail->Body = 'Codigo: ' . $confirmationCode;

        if ($mail->send())
            return true;
        else
            return false;
    }

    public static function SendNewPassword($destinationMail,$name,$newPassword)
    {
        $mail = Mail::InitMail($destinationMail);

        $mail->header = 'Esta es su nueva contraseña!';
        $mail->Subject = 'Para ' . $name;
        $mail->Body = 'Nueva contraseña: ' . $newPassword . '.<br>
        O bien puede conservarla, o luego puede cambiarla al iniciar sesión desde configuraciones.';

        if ($mail->send())
            return true;
        else
            return false;
    }
}
