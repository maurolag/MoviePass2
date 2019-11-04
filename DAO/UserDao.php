<?php

namespace DAO;

use Controllers\BaseController;
use \Exception as Exception;
use DAO\IUserDAO as IUserDAO;
use Models\User as User;
use Models\Address as Address;
use DAO\Connection as Connection;
use DAO\AddressDAO as AddressDAO;

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

        if ($result != null) {
            return $result;
        } else
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

        return $this->SearchUserByEmail($user->getEmail());
    }

    public function SearchUserByEmail($email)
    {
        $result = new User(null, null, null, null, null, null);

        $query = "SELECT * FROM " . $this->tableName .
            " WHERE Email = :email limit 1;";

        $parameters["email"] = $email;

        $this->connection = Connection::GetInstance();
        $result = $this->connection->Execute($query, $parameters, QueryType::Query);

        return $result;
    }

    public function UpdateUserPassword($email, $newPassword)
    {
        $query = "UPDATE " . $this->tableName . " SET UserPassword = '" . $newPassword . "' WHERE (:email = email);";

        $parameters["email"] = $email;

        $this->connection = Connection::GetInstance();
        $this->connection->ExecuteNonQuery($query, $parameters);
        return $newPassword;
    }

    public function UpdateUser(User $user)
    {
        $query = "UPDATE " . $this->tableName . " SET UserName = '" . $user->getUser() . "',
        IdGender = " . $user->getGender() . ",
        Birthdate = '" . $user->getBirthdate() . "' WHERE (email = :email);";

        $parameters["email"] = $user->getEmail();
        $this->connection = Connection::GetInstance();
        $this->connection->ExecuteNonQuery($query, $parameters);

        $result = array();
        

        return $this->SearchUserByEmail($user->getEmail());
    }

    public function GetAll()
    {
        echo "Not implemented yet";
    }

    public function Add(User $user)
    { }
}
