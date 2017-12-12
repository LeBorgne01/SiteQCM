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
		if(!is_null($this->logo) && isset($this->logo))
			$code .= '<link rel="shortcut icon" type="image/x-icon" href="' . $this->logo . '">';

		if(!is_null($this->charset) && isset($this->charset))
			$code .= '<meta charset="' . $this->charset . '">';

		if(!is_null($this->titre) && isset($this->titre))
			$code .= '<title>' . $this->titre . '</title>';

		if(!is_null($this->css) && isset($this->css))
			$code .= '<link rel="stylesheet" href="style/' . $this->css . '">';

		return $code;
	}

	public function header($_texte=null){
		$code = "<header>";
		if(!is_null($_texte))
			$code .= $_texte;
		
		return $code .= "</header>";
	}

	public function menu_nav_prof(){
		$code = '<nav>
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

	public function menu_nav_eleve(){
		$code ='<nav>
					<ul>
						<li><a href="index.php">Accueil</a></li>
						<li><a href="">Mes QCM</a></li>
						<li><a href="">Mon compte</a></li>
					</ul>
				</nav>';
		return $code;
	}

	public function ecran_connexion(){
		$code = "<p>Connectez-vous</p>";

		$form_connexion = new form("connexion","fonctions/form_connexion.php","post","");
		$form_connexion->set_input("text","login","Login",1);
		$form_connexion->add_br();
		$form_connexion->set_input("password","password","Mot de passe",1);
		$form_connexion->add_br();
		$form_connexion->set_submit("validerconnexion","Connexion");
		$code .= $form_connexion->get_form();

		return $code;
	}

	public function setLink($_href,$_valeur,$_type = null, $_css = null){
		$code = "<a ";

		if(!is_null($_type)){
			if($_type == "class"){
				$code .= "class='" .$_css."' ";
			}
			else if($_type == "id"){
				$code .= "id='".$_css."' ";
			}
		}
		$code .= "href='" . $_href . "'>".$_valeur."</a>";
		return $code;
	}

	/*public function ecran_inscription(){
		$code = "Ou inscrivez-vous ici (professeurs)";

		$form_inscription = new form("inscription","form_inscription.php","post","");
		$form_inscription->add_br();
		$form_inscription->set_input("text","id","Login",1);
		$form_inscription->add_br();
		$form_inscription->set_input("password","mdp","Mot de passe",1);
		$form_inscription->add_br();
		$form_inscription->set_input("password2","mdp","Confirmation",1);
		$form_inscription->add_br();
		$form_inscription->set_submit("validerinscription","S'inscrire");
		$code .= $form_inscription->get_form();

		return $code;
	}*/
}
?>