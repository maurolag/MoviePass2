<?php
namespace Models;

class User
{
        private $email;
        private $user;
        private $password;
        private $birthdate;
        private $gender;
        private $isAdmin;
        private $changedPassword;

        public function __construct($email, $user, $password, $birthdate, $gender)
        {
                $this->email = $email;
                $this->user = $user;
                $this->password = $password;
                $this->birthdate = $birthdate;
                $this->gender = $gender;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Get the value of user
         */ 
        public function getUser()
        {
                return $this->user;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Get the value of gender
         */ 
        public function getGender()
        {
                return $this->gender;
        }

        /**
         * Get the value of birthdate
         */ 
        public function getBirthdate()
        {
                return $this->birthdate;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of isAdmin
         */ 
        public function getIsAdmin()
        {
                return $this->isAdmin;
        }

        /**
         * Set the value of isAdmin
         *
         * @return  self
         */ 
        public function setIsAdmin($isAdmin)
        {
                $this->isAdmin = $isAdmin;

                return $this;
        }

        /**
         * Get the value of changedPassword
         */ 
        public function getChangedPassword()
        {
                return $this->changedPassword;
        }

        /**
         * Set the value of changedPassword
         *
         * @return  self
         */ 
        public function setChangedPassword($changedPassword)
        {
                $this->changedPassword = $changedPassword;

                return $this;
        }
}
