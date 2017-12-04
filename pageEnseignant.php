<?php
	session_start();
	require_once("fonctions/connexion_bdd.php");

	//On vérifie que l'utilisateur est connecté et qu'il s'agit bien d'un enseignant
	if(!isset($_SESSION['utilisateur']) || $_SESSION['utilisateur']['is_a'] != "Enseignant"){
		header('Location: index.php?erreur="Vous n\'êtes pas connecté"');
	}

?>
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<?php
		$resultatRequete = $BDD->select_qcm("*","loginEnseignant",$_SESSION['utilisateur']['login']);
		$resultatRequete->fetch();

		foreach ($resultatRequete as $row) {
			echo "<div classe='qcm'>";
			echo $resultatRequete[0];
		}
		
	?>
</body>
</html>