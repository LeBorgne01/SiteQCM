<?php
class HTML{
	private $logo;
	private $charset;
	private $titre;
	private $css;

	public function __construct($_logo,$_charset,$_titre,$_css){
		$this->logo = $_logo;
		echo $this->logo;
		$this->charset = $_charset;
		echo $this->charset;
		$this->titre = $_titre;
		echo $this->titre;
		$this->css = $_css;
		echo $this->css;
	}

	public function meta_data(){
		$code = "";
		if(!is_null($this->logo) && isset($this->logo)){
			$code .= '<link rel="shortcut icon" type="image/x-icon" href="' . $this->logo . '">';
		}

		if(!is_null($this->charset) && isset($this->charset)){
			$code .= '<meta charset="' . $this->charset . '">';
		}

		if(!is_null($this->titre) && isset($this->titre)){
			$code .= '<title>' . $this->titre . '</title>';
		}

		if(!is_null($this->css) && isset($this->css)){
			$code .= '<link rel="stylesheet" href="../style/' . $this->css . '">';
		}

		return $code;
	}
}
?>