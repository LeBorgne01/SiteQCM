<?php
	session_start();
	require_once("/fonctions/connexion_bdd.php");

	//On vérifie que l'utilisateur est connecté et qu'il s'agit bien d'un enseignant
	if(!isset($_SESSION['utilisateur']) || !is_a($_SESSION['utilisateur'],"Enseignant")){
		header('Location: index.php');
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