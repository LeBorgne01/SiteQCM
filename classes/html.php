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
			$code .= '<link rel="stylesheet" href="style/' . $this->css . '">';
		}

		return $code;
	}

	public function menu_nav_prof(){
		$code ='<nav>
					<ul>
						<li><a href="index.php">Accueil</a></li>
						<li><a href="">Ajouter un QCM</a></li>
						<li><a href="">Modifier un QCM</a></li>
						<li><a href="">Supprimer un QCM</a></li>
						<li><a href="">Mon compte</a></li>
					</ul>
				</nav>';
		return $code;
	}
}
?>