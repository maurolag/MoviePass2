<?php

namespace DAO;

use Controllers\BaseController;
use \Exception as Exception;
use DAO\IUserDAO as IUserDAO;
use Models\User as User;
use DAO\Connection as Connection;

class UserDAO implements IUserDAO
{
    private $connection;
    private $tableName = "Users";

    public function LogIn($user, $password)
    {
        $query = "SELECT * FROM " . $this->tableName .
            " WHERE (Email = :Email) AND UserPassword = :UserPassword;";

        $parameters["Email"] = $user;
        $parameters["UserPassword"] = $password;

        $this->connection = Connection::GetInstance();
        $result = $this->connection->Execute($query, $parameters, QueryType::Query);

        if ($result != null)
            return $result;
        else
            return null;
    }

    public function Register(User $user)
    {
        $query = "INSERT INTO " . $this->tableName . " (UserName,Email,UserPassword,IdGender,BirthDate,IdAddress,IsAdmin,ChangedPassword)
        VALUES (:user, :email, :password, :gender, :birthdate, :Address,0,0);";

        $parameters["user"] = $user->getUser();
        $parameters["email"] = $user->getEmail();
        $parameters["password"] = $user->getPassword();
        $parameters["gender"] = $user->getGender();
        $parameters["birthdate"] = $user->getBirthdate();
        $parameters["Address"] = 1;

        $this->connection = Connection::GetInstance();
        $this->connection->ExecuteNonQuery($query, $parameters);

        $user->setIsAdmin(false);
        $user->setChangedPassword(false);
        
        return $user;
    }

    public function SearchUserByEmail($email)
    {
        $result = new User(null,null,null,null,null,null);

        $query = "SELECT * FROM " . $this->tableName .
            " WHERE Email = :email limit 1;";

        $parameters["email"] = $email;

        $this->connection = Connection::GetInstance();
        $result = $this->connection->Execute($query, $parameters, QueryType::Query);

        return $result;
    }

    public function UpdateUserPassword($email, $newPassword){
        $query = "UPDATE " . $this->tableName . " SET UserPassword = '" . $newPassword . "' WHERE (:email = email);";

        $parameters["email"] = $email;
        
        $this->connection = Connection::GetInstance();
        $this->connection->ExecuteNonQuery($query, $parameters);
        return $newPassword;
    }

    //A CONTINUACION SOLO EJEMPLOS QUE VENIAN CON EL FRAMEWORK
    public function Add(User $user)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (UserName, Email, Password) VALUES (:userName, :email, :password);";

            $parameters["userName"] = $user->getName();
            $parameters["email"] = $user->getEmail();
            $parameters["password"] = $user->getPassword();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetAll()
    {
        try {
            $userList = array();

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $user = new User(null,null,null,null,null,null);
                $user->setName($row["userName"]);
                $user->setEmail($row["Email"]);
                $user->setPassword($row["Password"]);

                array_push($userList, $user);
            }

            return $userList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
