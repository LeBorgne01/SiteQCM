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
				$this->pdo = new PDO($dsn, $this->user, $this->password);
			}
			catch (Exception $e){
				die('Erreur : ' . $e->getMessage());
			}
		}

		/** 
		 *  execute la requête sql 'SELECT' dans la table utilisateur
		 *	@param string $_attribut l'attribut que l'on veut chercher grâce à la requête
		 *	@param string $_condition la condition de la requête SQL
		 *  @param int $_typeCondition la colonne qui intervient dans la condition : 1 si c'est login, 2 si c'est le password, 3 si c'est le statut
		 *  @return array|string qui contient le résultat de la requête effectuée (à fetch() ou pas)
		*/
		public function select_utilisateur($_attribut,$_condition,$_typeCondition){
			$requete = "SELECT ? FROM utilisateur";

			if($_condition != ""){
				$requete .= " WHERE ";
				if($_typeCondition == 1){
					$requete .= " login = ?";

					$this->pdo->prepare($requete);
					$resultat = $this->pdo->execute(array($_attribut,$_condition));
				}
				else if($_typeCondition == 2){
					$requete .= " password = ?";

					$this->pdo->prepare($requete);
					$resultat = $this->pdo->execute(array($_attribut,$_condition));
				}
				else if($_typeCondition == 3){
					$requete .= " statut = ?";

					$this->pdo->prepare($requete);
					$resultat = $this->pdo->execute(array($_attribut,$_condition));
				}
			}
			
			return $resultat;
		}

		/** 
		 *  execute la requête sql 'SELECT' dans la table etudiant
		 *	@param string $_attribut l'attribut que l'on veut chercher grâce à la requête
		 *	@param string $_condition la condition de la requête SQL
		 *  @param int $_typeCondition la colonne qui intervient dans la condition : 1 si c'est login, 2 si c'est le password, 3 si c'est le statut
		 *  @return array|string qui contient le résultat de la requête effectuée (à fetch() ou pas)
		*/
		public function select_etudiant($_attribut,$_condition,$_typeCondition){
			$requete = "SELECT ? FROM etudiant";

			if($_condition != ""){
				$requete .= " WHERE ";
				if($_typeCondition == 1){
					$requete .= " login = ?";

					$this->pdo->prepare($requete);
					$resultat = $this->pdo->execute(array($_attribut,$_condition));
				}
				else if($_typeCondition == 2){
					$requete .= " note = ?";

					$this->pdo->prepare($requete);
					$resultat = $this->pdo->execute(array($_attribut,$_condition));
				}
			}
			
			return $resultat;
		}


		/**
		 * 	execute une requête SQL qui permet de modifier des lignes dans la table 'utilisateur'
		 *	@param string $_string le mot de passe à inserer dans la table 
		 *	@param string $_login le login qui indique la ligne où on va modifier le mot de passe
		*/
		public function modifier_mdp_utilisateur($_string,$_login){
			try{
				
				$requete='UPDATE `utilisateur` SET `password`="'.$_string.'"WHERE login="'.$_login.'"';
				
				$stmt = $this->pdo->query($requete);
				

			}
			catch(PDOException $e){
				echo "Echec lors de l'ajout : ".$e->getMessage();
			}
			
		}

	}
?>