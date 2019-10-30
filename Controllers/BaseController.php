<?php

namespace Controllers;

use API\APIController as ApiController;

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
        return hash('sha1', $string, false);
    }

    public function ShowHomeView()
    {
        require_once(VIEWS_PATH . "HomeView.php");
    }

    public function HomologatesApiResponse($ApiRequest)
    {
        $arrayReque = array("api_key" => API_KEY, "language" => LANGUAGE_ES);
        $get_data = APIController::callAPI('GET', API_MAIN_LINK . $ApiRequest, $arrayReque);
        return json_decode($get_data, true);
    }
}
