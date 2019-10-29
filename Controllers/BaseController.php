<?php

namespace Controllers;

abstract class BaseController
{

    public function ValidateData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function CreateRandomNumber($lenght)
    {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $lenght; $i++) $key .= $pattern{
            mt_rand(0, $max)};
        return $key;
    }

    public static function Hash($string)
    {
        return hash('sha1',$string,false);
    }

    public function ShowHomeView()
    {
        require_once(VIEWS_PATH."HomeView.php");
    }
}
