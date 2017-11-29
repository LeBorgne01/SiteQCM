<?php

class Qcm
{
	private $_intitule;
	private $_description;

	public function __construct($inti, $desc){
		$this->_intitule = $inti;
		$this->_description = $desc;
	}

	public function addQuestion(){
		
	}

	public function displayQCM(){
		echo "<p>".$this->_intitule."</p><br/><p>".$this->_description."</p>";
	}

}

?>