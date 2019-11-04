<?php
	namespace Models;

	class Genre
	{
		private $id;
		private $name;

		public function getId()
		{
			return $this->id;
		}
	
		public function setId($id)
		{
			$this->id = $id;
			return $this;
		}
	
		/**
		 * Getter for Name
		*
		* @return [type]
		*/
		public function getName()
		{
			return $this->name;
		}
	
		public function setName($name)
		{
			$this->name = $name;
			return $this;
		}
	}
?>