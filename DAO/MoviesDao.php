<?php

namespace DAO;

use Controllers\BaseController;
use \Exception as Exception;
use DAO\IMoviesDAO as IMoviesDAO;
use Models\Movies as Movies;
use DAO\Connection as Connection;

class MoviesDAO implements IMoviesDAO
{
	private $connection;
	private $tableName = "Movies";
    private $genderTableName = "MoviesXGenders";

	public function getAll()
	{
		try 
		{
			$list = array();
			$query = "SELECT * FROM " . $this->tableName;
			$this->connection = Connection::GetInstance();
			$resultSet = $this->connection->Execute($query);

			foreach ($resultSet as $row) 
			{
				$movies = new Movies();
				$movies->setIdMovie($row["IdMovie"]);
				$movies->setIdMovieIMDB($row["IdMovieIMDB"]);
				$movies->setMovieName($row["MovieName"]);
				$movies->setDuration($row["Duration"]);
				$movies->setSynopsis($row["Synopsis"]);
				$movies->setReleaseDate($row["ReleaseDate"]);
				$movies->setPhoto($row["Photo"]);
				$movies->setEarnings($row["Earnings"]);
                $movies->setBudget($row["Budget"]);

				array_push($list, $movies);
			}
			return $list;
		} 
		catch (Exception $ex) 
		{
			throw $ex;
		}
	}

	public function add($movies)
	{
		try 
		{
			$query = "INSERT INTO " . $this->tableName . " (id_TMDB, titulo, duracion, descripcion, idioma, clasificacion, fechaDeEstreno, poster, video, popularidad) VALUES (:id_TMDB, :titulo, :duracion, :descripcion, :idioma, :clasificacion, :fechaDeEstreno, :poster, :video, :popularidad);";
			$parameters["IdMovieIMDB"] = $movies->getIdMovieIMDB();
			$parameters["MovieName"] = $movies->getMovieName();
			$parameters["Duration"] = $movies->getDuration();
			$parameters["Synopsis"] = $movies->getSynopsis();
			$parameters["ReleaseDate"] = $movies->getReleaseDate();
			$parameters["Photo"] = $movies->getPhoto();
			$parameters["Earnings"] = $movies->getEarnings();
			$parameters["Budget"] = $movies->getBudget();

			$this->connection = Connection::GetInstance();
			$this->connection->ExecuteNonQuery($query, $parameters);


		} 
		catch (Exception $ex) 
		{
			throw $ex;
		}
	}

	public function AddToDatabase($idMovieIMDB){
		$movies= $this->getMovieDetailsFromApi($idTMDB);
		$this->peliculaDAO->add($movies);
		return true;
	}

/* 	function remove($Movies)
	{
		try 
		{
			$query = "DELETE FROM " . $this->tableName . " WHERE id_Movies = " . $Movies->getId() . ";";

			$this->connection = Connection::GetInstance();
			$this->connection->ExecuteNonQuery($query);

			$query = "DELETE FROM " . $this->generoTableName . " WHERE id_Moviesa = " . $Movies->getId() . ";";

			$this->connection = Connection::GetInstance();
			$this->connection->ExecuteNonQuery($query);
		} 
		catch (Exception $ex) 
		{
			throw $ex;
		}
	} */

	public function getMovies($movies)
	{
		try
		{
			$query = "SELECT * FROM ".$this->tableName." WHERE IdMovie = ".$movies->getMovieId().";";
			$this->connection = Connection::GetInstance();
			$resultSet = $this->connection->Execute($query);

			foreach ($resultSet as $row) 
			{
				$movies->setIdMovie($row["IdMovies"]);
				$movies->setIdMovieIMDB($row["IdMovieIMDB"]);
				$movies->setMovieName($row["MovieName"]);
				$movies->setDuration($row["Duration"]);
				$movies->setSynopsis($row["Synopsis"]);
				$movies->setReleaseDate($row["ReleaseDate"]);
				$movies->setPhoto($row["Photo"]);
				$movies->setEarnings($row["Earnings"]);
                $movies->setBudget($row["Budget"]);
				return $movies;
			}			
		} 
		catch (Exception $ex) 
		{
			return null;
		}
	}

/* 	public function getGeneros($Movies)
	{
		try
		{
			$query = "SELECT * FROM " . $this->generoTableName . " WHERE id_Moviesa = " . $Movies->getId() . ";";
			$this->connection = Connection::GetInstance();
			$resultSet = $this->connection->Execute($query);

			$generos = array();
			foreach ($resultSet as $row) 
			{
				array_push($generos, $row["id_generoo"]);
			}
			return $generos;
		} 
		catch (Exception $ex) 
		{
			return null;
		}
	} */

/* 	public function saveGeneros($Movies, $generos)
	{
		try
		{
			foreach($generos as $genero)
			{
				$query = "INSERT INTO " . $this->generoTableName . " (id_Moviesa, id_generoo) VALUES (:id_Moviesa, :id_generoo);";
				$parameters["id_Moviesa"] = $Movies->getId();
				$parameters["id_generoo"] = $genero;

				$this->connection = Connection::GetInstance();
				$this->connection->ExecuteNonQuery($query, $parameters);
			}
		} 
		catch (Exception $ex) 
		{
			throw $ex;
		}
	} */

	public function getByMovieId($movieId)
	{
		try
		{
			$query = "SELECT * FROM " . $this->tableName . " WHERE IdMovie = " . $movieId . ";";
			$this->connection = Connection::GetInstance();
			$resultSet = $this->connection->Execute($query);

			foreach ($resultSet as $row) 
			{
				$movies->setIdMovie($row["IdMovies"]);
				$movies->setIdMovieIMDB($row["IdMovieIMDB"]);
				$movies->setMovieName($row["MovieName"]);
				$movies->setDuration($row["Duration"]);
				$movies->setSynopsis($row["Synopsis"]);
				$movies->setReleaseDate($row["ReleaseDate"]);
				$movies->setPhoto($row["Photo"]);
				$movies->setEarnings($row["Earnings"]);
                $movies->setBudget($row["Budget"]);
				return $movies;
			}			
		} 
		catch (Exception $ex) 
		{
			return null;
		}
	}

	public function getByIdMovieIMDB($idIMDB)
	{
		try
		{
			$query = "SELECT * FROM " . $this->tableName . " WHERE IdMovieIMBD = " . $idIMDB . ";";
			$this->connection = Connection::GetInstance();
			$resultSet = $this->connection->Execute($query);

			foreach ($resultSet as $row) 
			{
				$movies = new Movies();
				$movies->setIdMovie($row["IdMovie"]);
				$movies->setIdMovieIMDB($row["IdMovieIMDB"]);
				$movies->setMovieName($row["MovieName"]);
				$movies->setDuration($row["Duration"]);
				$movies->setSynopsis($row["Synopsis"]);
				$movies->setReleaseDate($row["ReleaseDate"]);
				$movies->setPhoto($row["Photo"]);
				$movies->setEarnings($row["Earnings"]);
                $movies->setBudget($row["Budget"]);
				return $movies;
			}			
		} 
		catch (Exception $ex) 
		{
			return null;
		}
	}

/* 	public function edit($Movies)
	{
		try 
		{
			$query = "UPDATE " . $this->tableName . " SET id_TMDB = :id_TMDB, titulo = :titulo, duracion = :duracion, descripcion = :descripcion, idioma = :idioma, clasificacion = :clasificacion, fechaDeEstreno = :fechaDeEstreno, poster = :poster, video = :video, popularidad = :popularidad WHERE id_Movies = :id_Movies;";
			$parameters["id_TMDB"] = $Movies->getIdTMDB();
			$parameters["titulo"] = $Movies->getTitulo();
			$parameters["duracion"] = $Movies->getDuracion();
			$parameters["descripcion"] = $Movies->getDescripcion();
			$parameters["idioma"] = $Movies->getIdioma();
			$parameters["clasificacion"] = $Movies->getClasificacion();
			$parameters["fechaDeEstreno"] = $Movies->getFechaDeEstreno();
			$parameters["poster"] = $Movies->getPoster();
			$parameters["video"] = $Movies->getVideo();
			$parameters["popularidad"] = $Movies->getPopularidad();
			$parameters["id_Movies"] = $Movies->getId();

			$this->connection = Connection::GetInstance();
			$this->connection->ExecuteNonQuery($query, $parameters);
		} 
		catch (Exception $ex) 
		{
			throw $ex;
		}
	} */
}
?>