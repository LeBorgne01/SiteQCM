
<?php
session_start();
	//On inclut les fichiers utilisés
require_once($_SESSION['root'] . "/classes/BaseDeDonnees.php");

	//On crée une nouvelle Base de données
$BaseDeDonnees = new BaseDeDonnees("root","qcm","","localhost");
	//On s'y connecte
$BaseDeDonnees->connexion();

	//Pour éviter les erreurs d'accent dans les mots
$requete = $BaseDeDonnees->get_pdo()->prepare("SET NAMES utf8");
$requete->execute();

	//Ajout d'un prefixe et d'un suffixe pour augmenter la sécurité des mots de passe
define("PREFIXE","15af14gh");
define("SUFFIXE","654ighj5");

	/**
	 * 	Permet de hasher un mot de passe en 'sha256'
	 *	@param string $_password le mot de passe à hasher en brute
	 *	@return string $hash le mot de passe hashé  	 
	*/
	function hash_password($_password){

		$hash = PREFIXE.hash("sha256",$_password).SUFFIXE;
		return $hash;

	}
	?>