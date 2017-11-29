<?php
class HTML{
	private $logo;
	private $charset;
	private $titre;
	private $css;

	public function __construct($_logo,$_charset,$_titre,$_css){
		$this->logo = $_logo;
		$this->charset = $_charset;
		$this->titre = $_titre;
		$this->css = $_css;
	}

	public function meta_data(){
		if(!is_null($this->logo) && !isset($this->logo)){
			echo '<link rel="shortcut icon" type="image/x-icon" href="' . $this->logo . '">';
		}

		if(!is_null($this->charset) && !isset($this->charset)){
			echo '<meta charset="' . $this->charset . '">';
		}

		if(!is_null($this->titre) && !isset($this->titre)){
			echo '<title>' . $this->titre . '</title>';
		}

		if(!is_null($this->css) && !isset($this->css)){
			echo '<link rel="stylesheet" href="../style/' . $this->css . '">';
		}
	}
}
?>