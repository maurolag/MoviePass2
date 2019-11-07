<?php
namespace DAO;

use Controllers\BaseController;
use \Exception as Exception;
use DAO\IUserDAO as IUserDAO;
use Models\User as User;
use DAO\Connection as Connection;

class TicketsDAO
{
    private $connection;

    public function LoadOrders($userId)
    {
        $invokeStoredProcedure = 'CALL GetOrdersByUser(?)';
        $parameters["UserId"] = $userId;

        $this->connection = Connection::GetInstance();
        return $this->connection->Execute($invokeStoredProcedure, $parameters, QueryType::StoredProcedure);
    }
}
