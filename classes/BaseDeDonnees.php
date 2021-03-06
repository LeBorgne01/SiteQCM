<?php
	class BaseDeDonnees{
		//Attribut de la classe BaseDeDonnees
		private $user;
		private $password;
		private $host;
		private $bdName;
		private $pdo;

		/**
		 * Constructeur de la classe BaseDeDonnees
		 *	@param string $_user le nom d'utilisateur pour se connecter à PhpMyAdmin
		 *  @param string $_bdName le nom de la base utilisée
		 *  @param string $_password le mot de passe pour se connecter à PhpMyAdmin
		 *  @param string $_host l'adresse où se situe la base de données
		*/
		public function __construct($_user,$_bdName,$_password,$_host){
			$this->set_user($_user);
			$this->set_password($_password);
			$this->set_host($_host);
			$this->set_bdName($_bdName);
		}

		/**
		 * Setter de l'attribut $user
		 *	@param string $_user le nom d'utilisateur pour se connecter à PhpMyAdmin
		*/
		public function set_user($_user){
			$this->user = $_user;
		}

		/**
		 * Setter de l'attribut $password
		 *	@param string $_password le mot de passe pour se connecter à PhpMyAdmin
		*/
		public function set_password($_password){
			$this->password = $_password;
		}

		/**
		 * Setter de l'attribut $host
		 *	@param string $_host le nom d'utilisateur pour se connecter à PhpMyAdmin
		*/
		public function set_host($_host){
			$this->host = $_host;
		}


		/**
		 * Setter de l'attribut $bdName
		 *	@param string $_bdName le nom de la base de données utilisée
		*/
		public function set_bdName($_bdName){
			$this->bdName = $_bdName;
		}

		/**
		 * Getter de l'attribut $pdo
		 *	@return pdo la base de données à laquelle on est connectée
		*/
		public function get_pdo(){
			return $this->pdo;
		}

		/**
		 *  fonction qui permet de se connecter à la base de données grâce aux attributs de la classe
		*/
		public function connexion(){
			try{
				$dsn = 'mysql:host='.$this->host.';port=3306;dbname='.$this->bdName.'';
				$this->pdo = new PDO($dsn, $this->user, $this->password,
				array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch (Exception $e){
				die('Erreur : ' . $e->getMessage());
			}
		}

		/** 
		 *  execute la requête sql 'SELECT' dans la table enseignant
		 *	@param string $_attribut l'attribut que l'on veut chercher grâce à la requête
		 *	@param string $_condition la condition de la requête SQL
		 *  @param int $_typeCondition la colonne qui intervient dans la condition : 'login' si c'est login, 'password' si c'est le password
		 *  @return array|string qui contient le résultat de la requête effectuée (à fetch() ou pas)
		*/
		public function select_enseignant($_attribut,$_typeCondition,$_condition){
			if($_attribut == "*"){
				$requete = "SELECT * FROM enseignant";
			}
			else{
				$requete = "SELECT ? FROM enseignant";
			}
			
			if($_condition != ""){
				$requete .= " WHERE ";

				if($_typeCondition == "login"){
					$requete .= " login = ?";
				}
				else if($_typeCondition == "password"){
					$requete .= " password = ?";
				}


				if($_attribut == "*"){
					$resultat = $this->pdo->prepare($requete);
					$resultat->execute(array($_condition));
				}
				else{
					$resultat = $this->pdo->prepare($requete);
					$resultat->execute(array($_attribut,$_condition));
				}
				
			}
			else{
				if($_attribut == "*"){
					$resultat = $this->pdo->prepare($requete);
					$resultat->execute();
				}
				else{
					$resultat = $this->pdo->prepare($requete);
					$resultat->execute(array($_attribut));
				}
				
			}
			
			return $resultat;
		}

		/** 
		 *  execute la requête sql 'SELECT' dans la table etudiant
		 *	@param string $_attribut l'attribut que l'on veut chercher grâce à la requête
		 *	@param string $_condition la condition de la requête SQL
		 *  @param int $_typeCondition la colonne qui intervient dans la condition : 'login' si c'est login, 'password' si c'est le password, moyenne si c'est la moyenne
		 *  @return array|string qui contient le résultat de la requête effectuée (à fetch() ou pas)
		*/
		public function select_etudiant($_attribut,$_typeCondition,$_condition){
			if($_attribut == "*"){
				$requete = "SELECT * FROM etudiant";
			}
			else{
				$requete = "SELECT ? FROM etudiant";
			}
			
			if($_condition != ""){
				$requete .= " WHERE ";
				if($_typeCondition == "login"){
					$requete .= "login = ?";
				}
				else if($_typeCondition == "password"){
					$requete .= "password = ?";
				}
				else if($_typeCondition == "moyenne"){
					$requete .= "moyenne = ?";
				}

				if($_attribut == "*"){
					$resultat = $this->pdo->prepare($requete);
					$resultat->execute(array($_condition));
				}
				else{
					$resultat = $this->pdo->prepare($requete);
					$resultat->execute(array($_attribut,$_condition));
				}
				
			}
			else{
				if($_attribut == "*"){
					$resultat = $this->pdo->prepare($requete);
					$resultat->execute();
				}
				else{
					$resultat = $this->pdo->prepare($requete);
					$resultat->execute(array($_attribut));
				}
				
			}
			
			return $resultat;
		}

		/**
		 * 	execute la requête sql 'SELECT'
		 *	@param string $_attribut l'attribut que l'on veut chercher grâce àa la requête
		 *  @param string $_table la table dans laquelle on va effectuer la requête
		 *	@param string $_condition la condition de la requête SQL
		 *  @return array|string qui contient le résultat de la requête effectuée (à fetch() ou pas)
		*/
		public function select($_attribut,$_table,$_condition){
			$requete = "SELECT $_attribut FROM $_table";

			if($_condition != ""){
				$requete .= " WHERE $_condition";
			}
			
			$res = $this->pdo->query($requete);
			return $res;
		}
		
		/**
		 *  execute la requête sql 'SELECT' dans la table qcm
		 *	@param string $_attribut l'attribut que l'on veut chercher grâce à la requête
		 *	@param string $_condition la condition de la requête SQL
		 *  @param int $_typeCondition la colonne qui intervient dans la condition : 'idQcm' si c'est l'ID du QCM, 'loginEnseignant' si c'est l'ID Enseignant, 'nom' si c'est le nom du QCM, 'description' si c'est la description du qcm
		 *  @return array|string qui contient le résultat de la requête effectuée (à fetch() ou pas)
		*/
		public function select_qcm($_attribut,$_typeCondition,$_condition){
			if($_attribut == "*"){
				$requete = "SELECT * FROM qcm";
			}
			else{
				$requete = "SELECT ? FROM qcm";
			}
			
			if($_condition != ""){
				$requete .= " WHERE ";
				if($_typeCondition == "idQcm"){
					$requete .= "idQcm = ?";
				}
				else if($_typeCondition == "loginEnseignant"){
					$requete .= "loginEnseignant = ?";
				}
				else if($_typeCondition == "nom"){
					$requete .= "nom = ?";
				}
				else if($_typeCondition == "description"){
					$requete .= "description = ?";
				}

				if($_attribut == "*"){
					$resultat = $this->pdo->prepare($requete);
					$resultat->execute(array($_condition));
				}
				else{
					$resultat = $this->pdo->prepare($requete);
					$resultat->execute(array($_attribut,$_condition));
				}
				
			}
			else{
				if($_attribut == "*"){
					$resultat = $this->pdo->prepare($requete);
					$resultat->execute();
				}
				else{
					$resultat = $this->pdo->prepare($requete);
					$resultat->execute(array($_attribut));
				}
				
			}

			return $resultat;
		}


		public function select_qcmEtudiant($_loginEtudiant){
			$requete = "SELECT idQcm FROM participation_qcm WHERE loginEtudiant = ?";
			$qcmEtudiant = $this->pdo->prepare($requete);
			$qcmEtudiant->execute(array($_loginEtudiant));

			$qcmEtudiant = $qcmEtudiant->fetchAll();
			
			
			$qcms = array();
			foreach ($qcmEtudiant as $idQcm) {
				$qcms[] = $this->select_qcm("*","idQcm",$idQcm['idQcm'])->fetch();
				
			}
			
			return $qcms;
		}


		public function select_questionQcm($_idQcm){
			$requete = "SELECT * FROM question WHERE idQcm = ?";
			$resultat = $this->pdo->prepare($requete);
			$resultat->execute(array($_idQcm));

			$resultat = $resultat->fetchAll();
			return $resultat;
		}


		/**
		 * 	execute une requête SQL qui permet de modifier des lignes dans la table 'utilisateur'
		 *	@param string $_string le mot de passe à inserer dans la table 
		 *	@param string $_login le login qui indique la ligne où on va modifier le mot de passe
		*/
		public function modifier_mdp_enseignant($_string,$_login){
			try{
				
				$requete = 'UPDATE enseignant SET password = "'.$_string.'"WHERE login="'.$_login.'"';
				
				$stmt = $this->pdo->query($requete);
				

			}
			catch(PDOException $e){
				echo "Echec lors de l'ajout : ".$e->getMessage();
			}
			
		}

	}
?>