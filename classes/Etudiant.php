<?php
	class Etudiant{
		private $login;
		private $password;
		private $moyenne;
		private $notes;

		public function __construct($_login,$_password){
			$this->login = $_login;
			$this->password = $_password;
			$this->notes = [];
		}

		public function calcul_moyenne(){
			$moyenne = 0;

			foreach ($this->notes as $note) {
				$moyenne += $note;
			}

			$moyenne = $moyenne / count($this->notes);

			$this->moyenne = $moyenne;
		}

		public function ajout_note($_note){
			$this->notes[] = $_note;
		}
	}