<?php
namespace Models;

class Address
{
        private $street;
        private $numberStreet;
        private $department;
        private $departmentFloor;
        private $idCity;

        public function __construct($street, $numberStreet, $department, $departmentFloor, $idCity)
        {
                $this->street = $street;
                $this->numberStreet = $numberStreet;
                $this->department = $department;
                $this->departmentFloor = $departmentFloor;
                $this->idCity = $idCity;
        }

        /**
         * Get the value of street
         */ 
        public function getStreet()
        {
                return $this->street;
        }

        /**
         * Get the value of numberStreet
         */ 
        public function getNumberStreet()
        {
                return $this->numberStreet;
        }

        /**
         * Get the value of department
         */ 
        public function getDepartment()
        {
                return $this->department;
        }

        /**
         * Get the value of departmentFloor
         */ 
        public function getDepartmentFloor()
        {
                return $this->departmentFloor;
        }

        /**
         * Get the value of idCity
         */ 
        public function getIdCity()
        {
                return $this->idCity;
        }
}
