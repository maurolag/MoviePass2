<?php
    namespace DAO;

    use Models\Movies as Movies;
    use DAO\Connection as Connection;

    interface IMoviesDAO
    {
        function Add(User $user);
        function GetAll();
    }
?>