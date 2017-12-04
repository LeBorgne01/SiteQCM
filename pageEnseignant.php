<?php
	session_start();
	require_once("fonctions/connexion_bdd.php");

	//On vérifie que l'utilisateur est connecté et qu'il s'agit bien d'un enseignant
	if(!isset($_SESSION['utilisateur']) || $_SESSION['utilisateur']['__PHP_Incomplete_Class_Name'] != "Enseignant"){
		header('Location: index.php?erreur="egoihq"');
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