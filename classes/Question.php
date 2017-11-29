<?php

	$typeQuestion = ["reponse","reponses","texte"];

	class Question{
		private $bareme;
		private $question;
		private $reponse;
		private $type;

		public function __construct($_bareme,$_question,$_reponse,$_type  = "reponse"){
			$this->bareme = $_bareme;
			$this->question = $_question;
			$this->reponse = $_reponse;
			$this->type = $_type;
		}

		public function set_type($_type){
			$this->type = $_type;
		}

		public function set_question($_question){
			$this->question = $_question;
		}

		public function set_bareme($_bareme){
			$this->bareme = $_bareme;
		}

		public function set_type($_type){
			$this->type = $_type;
		}

	}