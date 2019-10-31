<?php

namespace Controllers;

use DAO\MoviesDAO as MoviesDAO;
use Models\Movies as Movies;
use Exception;


require_once("BaseController.php");

class MoviesController extends BaseController
{

	private $moviesDao;
	
	function __construct()
	{
		$this->moviesDAO = new MoviesDAO();
	}


    public function ShowApiMovies($movieList=null){
		if($movieList==null){
			$page=1;
		}
		$movieList = $this->getNowPlayingMoviesInfoFromApi();
			
		while(count($movieList)==0){
			$movieList= $this->getNowPlayingMoviesInfoFromApi(++$page);
		}
		require_once(VIEWS_PATH . "moviesPlayingView.php");
	}
    
    public function GetNowPlayingMoviesFromApi()
    {
        return $this->HomologatesApiResponse('/movie/now_playing');
    }

    public function GetPosterFromApi($movieIdIMDB)
    {
        $respuesta = $this->HomologatesApiResponse('/movie/' . $movieIdIMDB. '/images');
		return IMG_LINK . $respuesta['posters'][0]['file_path'];
    }

    public function getNowPlayingMoviesInfoFromApi($page=null)
	{
		if($page==NULL){
			$page=1;
		}

		$apiMovie=array();

		$arrayToDecode = $this->HomologatesApiResponse('/movie/now_playing');

		foreach ($arrayToDecode["results"] as $valuesArray) 
		{
			if($this->moviesDAO->getByIdMovieIMDB($valuesArray["id"]) == null){
			
				$movies = new Movies();

				$movies->setIdMovieIMDB($valuesArray["id"]);
				
				if($valuesArray["poster_path"] != NULL)
				{
					$posterPath = "https://image.tmdb.org/t/p/w500".$valuesArray["poster_path"];
				}
				else 
				{
					$posterPath = IMG_PATH."noImage.jpg";
				}

				$movies->setPhoto($posterPath);
				$movies->setMovieName($valuesArray["title"]);
				$movies->setReleaseDate($valuesArray["release_date"]);
				array_push($apiMovie, $movies);
				
			}
		}
		return $apiMovie;
	}

}
