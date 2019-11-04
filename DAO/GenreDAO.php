<?php

namespace DAO;

use \Exception as Exception;
use Models\Genre as Genre;
use DAO\Connection as Connection;

class GenreDAO
{
    private $connection;
    private $tableName = "Genres";

    public function getAll()
    {
        try {
            $list = array();
            $query = "SELECT * FROM " . $this->tableName . " ORDER BY GenreName;";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $genre = new Genreo();
                $genre->setId($row["IdGenre"]);
                $genre->setName($row["GenreName"]);
                array_push($list, $genre);
            }

            return $list;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function add($genero)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (IdGenre, GenreName) VALUES (:IdGenre, :GenreName);";
            $parameters["IdGenre"] = $genre->getId();
            $parameters["GenreName"] = $genre->getName();
            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function remove($genre)
    {
        try {
            $query = "DELETE FROM " . $this->tableName . " WHERE IdGenre = " . $genre->getId() . ";";

            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function getGenre($genre)
    {
        try {
            $query = "SELECT * FROM " . $this->tableName . "WHERE IdGenre = " . $genre->getId() . ";";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $genero->setId($row["id_genero"]);
                $genero->setName($row["nombre"]);
            }
            return $genero->getName();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

?>