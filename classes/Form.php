<?php
	class Form{
		private $form;

		/**
		 * 	Constructeur de la classe form qui permet de commencer le formulaire HTML
		 *	@param string $_name le nom du formulaire créé
		 *	@param string $_action l'action du formulaire créé
		 *	@param string $_method la méthode utilisée dans ce formulaire
		 *  @param string $_class la class à utilisé dans le CSS
		 *	@param string $_enctype l'enctype utlisé dans ce formulaire
		*/
		public function __construct($_class,$_name,$_action,$_method,$_enctype){
			$this->form = "<form class='".$_class."' name='".$_name."' action='".$_action."' method='".$_method."'";

			//On regarde si on a un 'enctype'
			if($_enctype == ""){
				$this->form .=">";
			}
			else{
				$this->form .= " enctype='".$_enctype."'>";
			}
		}

		/**
		 * 	Permet d'ajouter un input dans le formulaire créé
		 *	@param string $_type le type de l'input ajouté
		 *	@param string $_name le nom de l'input ajouté
		 *  @param string $_class la class à utilisé dans le CSS
		 *	@param string $_placeholder le placeholder de l'input ajouté (peut être vide)
		 *	@param boolean $_required si oui ou non l'input est obligatoire à remplir
		*/
		public function set_input($_class, $_type,$_name,$_placeholder,$_required){
			$this->form .= "<input class ='".$_class."' type='".$_type."'";

			if($_name != ""){
				$this->form .= " name='".$_name."'";
			}

			if($_placeholder != ""){
				$this->form .= " placeholder='".$_placeholder."'";
			}

			if($_required == "true"){
				$this->form .= " required";
			}

			$this->form .= ">";
		}

		/**
		 * 	Permet d'ajouter le bouton de validation du formulaire
		 *	@param string $_class la classe utilisé dans le CSS
		 *	@param string $_name le nom du bouton de validation
		 *	@param string $_value la valeur que prend le bouton de validation
		*/
		public function set_submit($_class, $_name,$_value){
			$this->form .= "<input class='".$_class."' type='submit' name='".$_name."' value='".$_value."'>";
		}

		/**
		 * 	Permet d'obtenir le formulaire complet créé
		 *	@return string $this->form le formulaire complet créé 
		*/
		public function get_form(){
			$this->form .= "</form>";
			echo $this->form;
		}

		/**
		 * 	Permet d'ajouter un input caché au formulaire
		 *	@param string $_name le nom de l'input caché
		 *	@param string $_value la valeur que prend l'input caché
		*/
		public function set_hidden($_name,$_value){
			$this->form .= "<input type='hidden' name='".$_name."' value='".$_value."'>";
		}
		/**
		 * 	Permet d'ajouter un input avec une valeur dans le formulaire créé
		 *  @param string $_class la class utilisé dans le CSS
		 *	@param string $_type le type de l'input ajouté
		 *	@param string $_name le nom de l'input ajouté
		 *	@param string $_placeholder le placeholder de l'input ajouté (peut être vide)
		 *	@param boolean $_required si oui ou non l'input est obligatoire à remplir
		 *	@param string $_value la valeur que l'input prend
		*/
		public function set_input_value($_class, $_type,$_name,$_placeholder,$_required,$_value){
			$this->form .= "<input class ='".$_class."' type='".$_type."'";

			if($_name != ""){
				$this->form .= " name='".$_name."'";
			}

			if($_placeholder != ""){
				$this->form .= " placeholder='".$_placeholder."'";
			}

			if($_required){
				$this->form .= " required";
			}
			if($_value!=""){
				$this->form .= " value='".$_value."'";
			}

			$this->form .= "/>";

		}


	}


?>