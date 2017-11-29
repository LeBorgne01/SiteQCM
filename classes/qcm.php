<?php

class Qcm
{
	private $intitule;
	private $description;
	private $note;

	public function __construct($inti, $desc){
		$this->intitule = $inti;
		$this->description = $desc;
	}

	public function addQuestion(){
		echo '<input id="" type="button"'
	}

	public function displayQCM(){
		echo "<p>".$this->intitule."</p><br/><p>".$this->description."</p>";
	}

}

?>