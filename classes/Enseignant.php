<?php
	class Enseignant{
		private $login;
		private $password;

		public function __construct($_login, $_password){
			$this->login = $_login;
			$this->password = $_password;
		}


	}