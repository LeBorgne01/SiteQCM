<?php
	class Enseignant{
		private $login;
		private $password;

		public function __construct($_login, $_password){
			$this->login = $_login;
			$this->password = $_password;
		}

		public function getLogin(){
			return $this->login;
		}

		public function getPassword(){
			return $this->password;
		}

	}