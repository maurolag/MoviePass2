<?php

namespace Controllers;

require_once("BaseController.php");

class MoviesController extends BaseController
{
    public function GetNowPlayingMoviesFromApi()
    {
        return $this->HomologatesApiResponse('/movie/now_playing');
    }

    public function GetPosterFromApi($movieIdIMDB)
    {
        $respuesta = $this->HomologatesApiResponse('/movie/' . $movieIdIMDB. '/images');
        return IMG_LINK . $respuesta['posters'][0]['file_path'];
    }
}
