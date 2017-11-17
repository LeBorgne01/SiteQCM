<?php
	class BDD{
		//Attribut de la classe BDD
		private $user;
		private $password;
		private $host;
		private $bdName;
		private $pdo;

		/**
		 * Constructeur de la classe BDD
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
		 * 	A refaire
		 *  execute la requête sql 'SELECT'
		 *	@param string $_attribut l'attribut que l'on veut chercher grâce à la requête
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