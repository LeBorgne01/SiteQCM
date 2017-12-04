<?php
	//On démarre la session
session_start();

	//on vérifie si les champs sont bien remplis
if(empty($_POST['login']) || empty($_POST['password'])){
	header("Location: ./index.php?erreur=Login ou mot de passe vide ");    
}
else{
		//Sécurité pour réduire le spam de connexion
	sleep(1);

		//On se connecte à la base de données
	require_once("connexion_bdd.php");
	
	

		//on enregistre les données postées dans le formulaire et on les sécurise des caractères spéciaux
	$login = htmlspecialchars($_POST['login']);
	$password = htmlspecialchars($_POST['password']);

		//On effectue la requête SQL pour vérifier si l'utilisateur est inscrit et s'il a le bon mot de passe
	$resultat = $BaseDeDonnees->select_enseignant("*","login",$login);
	
	$resultat = $resultat->fetch();
	
	
		//On hash le mot de passe poster pour le comparer à celui de la base de données
	$hash = hash_password($password);



		//On regarde si notre résultat est vide, s'il est vide cela veut dire que l'utilisateur n'existe pas, sinon on vérifie le mot de passe
	if(!empty($resultat)){



		if($resultat[1] != $hash){
			header("Location: ./index.php?erreur=Login-Password-Faux");      
		}
		else{
				//Si on a une bonne connexion, on peut sauvegarder les champs de session
			require_once("./classes/Enseignant.php");

			$enseignant =new Enseignant($login,$hash);
			$_SESSION["utilisateur"]=$enseignant;
			
			// redirection vers page enseignant
			
		}
	}

	else{
		$resultat = $BaseDeDonnees->select_etudiant("*","login",$login);
		//On regarde si notre résultat est vide, s'il est vide cela veut dire que l'utilisateur n'existe pas, sinon on vérifie le mot de passe
		$resultat = $resultat->fetch();
		if(!empty($resultat)){


			if($resultat[1] != $hash){
				header("Location: ./index.php?erreur=Login-Password-Faux");      
			}
			else{
				//Si on a une bonne connexion, on peut sauvegarder les champs de session
				
				require_once ("../classes/Etudiant.php");

				$etudiant =new Etudiant($login,$hash);
				$_SESSION["utilisateur"]=$etudiant;

				// redirection vers page étudiant
				
			}
		}
		else{
			header("Location: ./index.php?erreur=Erreur-identification");
		}
	}
}
?>